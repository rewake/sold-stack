<?php

namespace Database\Seeders;

use App\Imports\InventoryImport;
use App\Imports\OrderImport;
use App\Imports\ProductImport;
use App\Imports\UserImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class DeploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: NOTE: There's no exception catching here mainly due to time constraints.
        // however, I've tested import on all 4 CSVs and we "should" be able to safely
        // import the provided CSV files without issue.
        echo 'Importing Users... ';
        Excel::import(new UserImport, 'docs/data/users.csv');
        echo 'Done.' . PHP_EOL;

        echo 'Importing Products... ';
        Excel::import(new ProductImport, 'docs/data/products.csv');
        echo 'Done.' . PHP_EOL;

        echo 'Importing Inventory... ';
        Excel::import(new InventoryImport, 'docs/data/inventory.csv');
        echo 'Done.' . PHP_EOL;

        echo 'Importing Orders... ';
        Excel::import(new OrderImport, 'docs/data/orders.csv');
        echo 'Done.' . PHP_EOL;
    }
}
