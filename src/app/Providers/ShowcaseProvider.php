<?php

namespace Showcase\App\Providers;

use Illuminate\Support\ServiceProvider;

class ShowcaseProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'showcase');

        $this->publishes([
            __DIR__.'/resources/views/public' => resource_path('/views/vendor/showcase')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
