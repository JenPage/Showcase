# With thanks to https://stackoverflow.com/questions/7069682/how-to-get-arguments-with-flags-in-bash-script
while test $# -gt 0; do
    case "$1" in
        "-n" | "--nomigrations")
            migrations=false
            echo "Migrations will NOT run."
            shift
            ;;
        "-d" | "--rundev")
            rundev=true
            echo "Will run dev"
            shift
            ;;
        *)
            migrations=true
            echo "Migrations will run."
            shift
            rundev=false
            echo "Will NOT run dev"
            shift
    esac
done

if [ "$rundev" = true ]; then
    cd package/src
    npm run dev
    cd ../..
fi
cd test-project
composer update brokerexchange/showcase
composer dump-autoload
php artisan cache:clear
php artisan view:clear
php artisan vendor:publish --tag=showcase --force
if [ "$migrations" = true ]; then 
    php artisan migrate:refresh --seed
    php artisan db:seed --class=ShowcaseDatabaseSeeder
fi
echo "Test project updated!"