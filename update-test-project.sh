cd test-project
composer update brokerexchange/showcase
composer dump-autoload
rm -rf ./resources/views/vendor/showcase # Re-publishing the assets does not update when the directories already exist, for some reason, so this is a hacky way to force updates.
php artisan vendor:publish --tag=showcase
php artisan migrate:fresh
php artisan db:seed --class=ShowcaseDatabaseSeeder
echo "Test project updated!"