## Installation
download project from github
````
git@github.com:DmitriyBaran/profbit_test.git
````
Run command:
````
- composer install
````

Create database from migration. Run command:
````
php bin/console doctrine:migrations:migrate
````
Fill table with command:
````
php bin/console doctrine:fixtures:load
````

Start project with command:
````
php -S 127.0.0.1:8000 -t public
````


## End point
- **http://localhost:8000/product** - Listing of products
- **http://localhost:8000/product_info** - Info of products
