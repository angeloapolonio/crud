Notes:

use MySQL for the DB


setup your mysql to use the following:
database name: laravel
host: localhost
username: root 
password:

if you are using Laravel Sail, change the DB_HOST to DB_HOST=mysql in your .env file


Initial setup

run:
composer install

to create the tables needed:
php artisan migrate

to test:
http://localhost
