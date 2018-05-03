<?php

namespace Showcase\App\Providers;

use Illuminate\Support\Facades\Blade;
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
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../../routes.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'showcase');

        $this->publishes([
            __DIR__.'/../../config.php' => config_path('showcase.php'),  
            __DIR__.'/../../resources/assets/build' => public_path('vendor/showcase'),          
            __DIR__.'/../../resources/views' => resource_path('/views/vendor/showcase'),
        ], 'showcase');

        Blade::directive('showcaseDisplay', function ($display) {
            return "<?php \$__env->startComponent(\"showcase::public.components.display.{$display}->component_view\", compact('display')); ?><?php echo \$__env->renderComponent(); ?>";
        });

        Blade::directive('showcaseTrophy', function ($trophy) {
            return "<?php \$__env->startComponent(\"showcase::public.components.trophy.{$trophy}->component_view\", compact('trophy')); ?><?php echo \$__env->renderComponent(); ?>";
        });
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
