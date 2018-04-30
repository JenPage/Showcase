cd test-project
composer update brokerexchange/showcase
composer dump-autoload
php artisan vendor:publish --tag=showcase --force
php artisan migrate:refresh --seed
php artisan db:seed --class=ShowcaseDatabaseSeeder
echo "Test project updated!"