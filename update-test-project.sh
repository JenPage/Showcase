case "$1" in
    "-n" | "--nomigrations")
        migrations=false
        echo "Migrations will NOT run."
        ;;
    *)
        migrations=true
        echo "Migrations will run."
esac

cd test-project
composer update brokerexchange/showcase
composer dump-autoload
php artisan vendor:publish --tag=showcase --force
if [ $migrations = true ]; then 
    php artisan migrate:refresh --seed
    php artisan db:seed --class=ShowcaseDatabaseSeeder
fi
echo "Test project updated!"