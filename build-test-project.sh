if [ -d "./test-project" ]; then
    rm -rf test-project
    echo "Removed old test project."
fi

composer create-project laravel/laravel test-project 5.5.*
php ./edit-composer.php
cd test-project
composer require brokerexchange/showcase=dev-feature/1.0
cd ..
bash update-test-project.sh
echo "Test project built!"
echo "To fire it up, cd into the test project and use php artisan serve"