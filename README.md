# How To Use

## Build Setup

``` bash
# install composer & dependencies
$ composer install
$ npm install

---------------------------------------
# chang file name .env.example to .env
---------------------------------------

# generate key
$ php artisan key:generate

# migration database
$ php artisan migrate

# upload product data with seeder
$ php artisan db:seed --class=DatabaseSeeder

# run project
$ composer run dev
```