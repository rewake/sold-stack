# SOLD! STACK

## Test Environment

### Laravel Sail

This application uses Docker as a test environment, which is powered by Laravel Sail. To run the application, 
navigate to the root project dir from a command terminal and run the following command(s):

* Build and run the docker container: `./vendor/bin/sail up`
* Build and run the docker container (background): `./vendor/bin/sail up -d`
* Turn the container off: `./vendor/bin/sail down`

## Deployment

### Initial Deployment

Please run the following commands to get the SOLD! STACK application
up and running for the first time.

<b>NOTE:</b> This method of running the application assumes you have docker running
in your environment. If this is *NOT* the case, please contact me so
we can discuss installation on your specific environment further.

* `composer install`
* `cp .env.example .env`
* `./vendor/bin/sail up -d`
* `./vendor/bin/sail artisan ss:deploy -i`
