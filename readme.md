# Showcase

A Laravel package which adds the ability to create "showcases", or view boxes which contain cards "trophies" of items. It also includes an admin panel to manage displays and trophies, which can only be accessed by a logged-in Auth user. Intended for use by Laravel 5.5+

> Still being developed!

## Todos:
    - get to 1.0
        - add the admin section
        - create components for dropping in the view boxes
    - 1.1
        - Replace buttons with FontAwesome icons where appropriate

## Installation

### Install the package

[to do]

### Install the package development environment
```
git clone [the-url]
composer install
npm install
```

#### Test Project
To create a test project:
`bash build-test-project.sh`

> This can also be used to rebuild the test project if you messed something up.

#### Update
To update the test project with package changes:
`bash update-test-project.sh`

This will also dump composer's autoload and clear the Laravel cache and compiled views.

Flags you can use:
- `--nomigrations`: update without refreshing the migrations

If you want to use a different DB, change the credentials at the top of `build-test-project.sh` to match your desired credentials.

#### Authentication
The test project generates Auth during the build. A default user is created with the test project:

> email: homestead@test.email <br>
> password: secret

You will need this to access the Showcase admin panels, as they are secured behind the Auth middleware by default. This can be changed from the config file.

#### Assets
To build the JS and SCSS assets, just `cd package/src/` and `npm run dev`, which will compile everything into the `resources/build` directory. The package will handle integrating the assets within a Laravel project's public resources.

You will need to add a link to `/vendor/showcase/public.css` to your project's `head` section, wherever the rest of your stylesheets are being included. Alteratively, if you'd rather bundle the public styles to your app stylesheet, you can import them by add `@import "public/vendor/showcase/public";` to your main stylesheet.

---

## Use

Showcase is designed to be as simple to use as possible.

### Displays
Using displays on your frontend is easy. First, get a display and pass it into the view:

```
$display = \Showcase\Showcase::display('Sample Box');
...
return view('view.name', compact('display'));
```

To use it in the view, simply use the `@showcaseDisplay()` directive:

```
@showcaseDisplay($display)
```

The display's template will be rendered automatically.

### Trophies

If you look in the default display component views, you'll notice that they each call `showcaseTrophy($trophy, $display)`. This directive renders a trophy component view, which renders a trophy's component view (or the display's default trophy component view, if the trophy has no component view or `force_trophy_default` is set to `true`).

Both display and trophy component views can be customized.

---

## End User Customization

### Display Components
After you've installed the package, you can use `php artisan vendor:publish --tag=showcase` to publish the package resources.

#### Modify Existing Views
Once the resources are published, you can find them in the `resources/views/vendor/showcase` directory. You can modify any of the package views, including the admin panels.

#### Add Custom Display Component
If you want to add a custom component, just create a new file in `resources/views/vendor/showcase/public/components`. Then, when creating or editing a display, type in the name of your custom component (sans the blade extension) and your display will use it!

#### Custom CSS
Just target the Showcase selectors with your CSS to customize the styling. To make the custom styling show up on the admin panels, make sure you add a link tag for your CSS to the `_stylesheets` include in `resources/views/vendor/showcase/app/includes`.

### Configuration
There are some configuration options exposed for you in the config file `showcase.php`.

#### Table Prefix
By default, all showcase tables are prefixed with `showcase_`. You may change this to whatever you desire.

#### Middleware
By default, all admin routes for Showcase are passed through `web` and `auth`. You may change this array in config to add or remove middleware as you want.