if [ -d "./test-project" ]; then
    rm -rf test-project
    echo "Removed old test project."
fi

composer create-project laravel/laravel test-project 5.5.*
bash update-test-project.sh
echo "Test project built!"
echo "To fire it up, cd into the test project and use php artisan serve"