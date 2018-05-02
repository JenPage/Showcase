# Showcase

A Laravel package which adds the ability to create "showcases", or view boxes which contain cards of items. It also includes an admin panel to manage showcases, which can only be accessed by a logged-in Auth user. Intended for use by Laravel 5.5+

> Still being developed!

## Todos:
    - get to 1.0
        - add the admin section
        - create components for dropping in the view boxes

## Install
```
git clone [the-url]
composer install
npm install
```

## Test Project
To create a test project:
`bash build-test-project.sh`

> This can also be used to rebuild the test project if you messed something up.

### Update
To update the test project with package changes:
`bash update-test-project.sh`

Flags you can use:
- `--nomigrations`: update without refreshing the migrations

If you want to use a different DB, change the credentials at the top of `build-test-project.sh` to match your desired credentials.

### Authentication
The test project generates Auth during the build. A default user is created with the test project:

> email: homestead, password: secret

You will need this to access the Showcase admin panels, as they are secured behind the Auth middleware by default. This can be changed from the config file.

## Assets
To build the JS and SCSS assets, just `cd package/src/` and `npm run dev`, which will compile everything into the `resources/build` directory. The package will handle integrating the assets within a Laravel project automagically.

---

## End User Customization

After you've installed the package, you can use `php artisan vendor:publish --tag=showcase` to publish the package resources.

### Modify Existing Displays
Once the resources are published, you can find them in the `resources/views/vendor/showcase` directory. You can modify any of the package views, including the admin panels.

### Add Custom Display Component
If you want to add a custom component, just create a new file in `resources/views/vendor/showcase/public/components`. Then, when creating or editing a display, type in the name of your custom component (sans the blade extension) and your display will use it!

### Custom CSS
Just target the Showcase selectors with your CSS to customize the styling. To make the custom styling show up on the admin panels, make sure you add a link tag for your CSS to the `_stylesheets` include in `resources/views/vendor/showcase/app/includes`.