while [ "${1:-}" != "" ]; do
    case "$1" in
        "-n" | "--nomigrations")
            migrations=false
            ;;
        *)
            migrations=true
    esac
    shift
done

cd test-project
composer update brokerexchange/showcase
composer dump-autoload
php artisan vendor:publish --tag=showcase --force
if [ migrations == true ]; then 
    php artisan migrate:refresh --seed
    php artisan db:seed --class=ShowcaseDatabaseSeeder
fi
echo "Test project updated!"