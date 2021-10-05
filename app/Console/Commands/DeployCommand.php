<?php

namespace App\Console\Commands;

use Database\Seeders\CreateConfigs;
use Database\Seeders\DeploymentSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\InputOption;

class DeployCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ss:deploy {--a|auto} {--i|install}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs necessary commands to setup the application during deployment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->banner();

        // Confirm user wants to continue, if "auto" flag is not set
        if (!$this->option('auto') && !$this->confirm("Would you like to continue?")) {
            $this->bye();
            return 0;
        }

        if ($this->option('install')) {

            // Make sure we have an env file
            // TODO: env command can be enhanced to handle this
            $this->header("Verify .env file exists");
//            $this->call('app:env');
            $disk = Storage::build([
                'driver' => 'local',
                'root' => base_path(),
            ]);
            if ($disk->exists('.env')) {
                $this->info("  ✔️ .env file exists");
            } else {
                $this->alert("Cannot continue: .env file does not exist");
                return 0;
            }
            $this->newLine();

            // Generate App Key
            $this->call('key:generate');

            // Create storage link
            $this->call('storage:link');
        }

        // Run Composer
        $this->header("Install composer dependencies");
        $command = "composer install";
        if (env('APP_ENV') === 'production') {
            $command .= " --no-dev";
        }
        passthru($command);
        $this->newLine();

        // Run migrations
        $this->call('migrate', ['--force']);

        // Seed Database
        if ($this->option('install')) {
            $this->call('db:seed', [
                '--class' => DeploymentSeeder::class
            ]);
        }

        // Run IDE helper
//        if (env('APP_ENV') !== 'production') {
//            $this->call('ide-helper:generate');
//            $this->call('ide-helper:models', ['--nowrite', '--no-interaction']);
//        }

        // Run NPM
        if (env('APP_ENV') !== 'production') {
            $this->header("Install & run NPM packages");
            passthru('npm i && npm run dev');
            $this->newLine();
        }

        // Clear caches
        $this->call('optimize:clear');
//        $this->call('permission:cache-reset');
        $this->call('cache:clear');
        $this->call('view:clear');
        $this->call('config:clear');

        $this->done();
        $this->bye();

        return 0;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['auto', 'a', InputOption::VALUE_NONE, 'Auto install with no prompts'],
            ['install', 'i', InputOption::VALUE_NONE, 'Run initial installation commands'],
        ];
    }

    private function header($text)
    {
        $this->newLine();
        $this->line("<options=bold>$text</>");
        $this->line("--------------------------------------------------------");
    }

    public function call($command, array $arguments = [])
    {
        $this->header($this->resolveCommand($command)->getDescription());
        parent::call($command, $arguments);
        $this->newLine();
    }

    private function banner()
    {
        $app_name = env('APP_NAME');

        $this->output->write("
_______________________________________________________
   ____ ____ _    ___    /  ____ ___ ____ ____ _  _
   [__  |  | |    |  \  /   [__   |  |__| |    |_/
   ___] |__| |___ |__/ .    ___]  |  |  | |___ | \_
_______________________________________________________

 This script will install & configure the {$app_name}
 application. Please ensure that your .env file and
 any other necessary configuration has been setup
 before running this command.
");
        $this->newLine();
    }

    private function done()
    {
        $app_name = env('APP_NAME');
        $url = env('APP_URL');

        $this->output->write("
_______________________________________________________

 <options=bold>CONGRATS!</>
_______________________________________________________

 {$app_name} is now configured and ready to use!
");
    }

    private function bye()
    {
        $this->output->write("
_______________________________________________________

                                             ~ goodbye
_______________________________________________________

");
    }
}
