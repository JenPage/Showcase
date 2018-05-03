# Change these to the values for your test MySQL DB
db_host=192.168.10.10
db_port=3306
db_database=homestead
db_username=homestead
db_password=secret

if [ -d "./test-project" ]; then
    cd test-project
    php artisan migrate:reset
    cd ..
    rm -rf test-project
    echo "Removed old test project."
fi

composer create-project laravel/laravel test-project 5.5.*
php ./edit-composer.php
cd test-project
sed -i '' "s/DB_HOST=127.0.0.1/DB_HOST=$db_host/g" .env
sed -i '' "s/DB_PORT=3306/DB_PORT=$db_port/g" .env
sed -i '' "s/DB_DATABASE=homestead/DB_DATABASE=$db_database/g" .env
sed -i '' "s/DB_USERNAME=homestead/DB_USERNAME=$db_username/g" .env
sed -i '' "s/DB_PASSWORD=secret/DB_PASSWORD=$db_password/g" .env
sed -i '' "s|// \$this->call(UsersTableSeeder::class);|\$this->call(UsersTableSeeder::class);|" ./database/seeds/DatabaseSeeder.php
cp ../UsersTableSeeder.php ./database/seeds/
php artisan make:auth
composer require brokerexchange/showcase=dev-feature/1.0
cd ..
bash update-test-project.sh
echo "Test project built!"
echo "To fire it up, cd into the test project and use php artisan serve"