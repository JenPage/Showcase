<?php

namespace Showcase\App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
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
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'showcase');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'showcase');

        $this->publishes([
            __DIR__.'/../../config.php' => config_path('showcase.php'),  
            __DIR__.'/../../resources/assets/build' => public_path('vendor/showcase'),          
            __DIR__.'/../../resources/views' => resource_path('/views/vendor/showcase'),
        ], 'showcase');

        $this->publishes([
            __DIR__.'/../../resources/assets/build' => public_path('vendor/showcase'), 
        ], 'showcase-assets');

        Blade::directive('showcaseDisplay', function ($display) {
            return "<?php
            if ({$display} !== '') {
                if(view()->exists(\"showcase::public.components.display.{$display}->component_view\")){

                \$__env->startComponent(\"showcase::public.components.display.{$display}->component_view\", ['display' => {$display}]);
                echo \$__env->renderComponent();

                }else{
                {$display}->component_view = 'sheet';
                 \$__env->startComponent(\"showcase::public.components.display.{$display}->component_view\", ['display' => {$display}]);

                echo \$__env->renderComponent();
                }
            }
            ?>";
        });

        Blade::directive('showcaseTrophy', function ($expression) {

            list($trophy, $display) = substr_count($expression, ',') > 0
                ? explode(',', str_replace(' ', '', $expression))
                : [$expression, null];

            $displayStr = $display !== null ? "\$display" : '""';

                return "<?php

                    if(view()->exists(\"showcase::public.components.trophy.{$trophy}->component_view\")){

                        \$__env->startComponent(\"showcase::public.components.trophy.{$trophy}->component_view\", ['trophy' => {$trophy}, 'display' => $displayStr]);

                        echo \$__env->renderComponent();

                    }else{

                      \$__env->startComponent(\"showcase::public.components.trophy.description_link\", ['trophy' => {$trophy}, 'display' => $displayStr]);

                        echo \$__env->renderComponent();
                    }

                 ?>";


        });



        Validator::extend('display_exists', function ($attribute, $value, $parameters, $validator) {
            return \Showcase\Showcase::templateFileExists($value, 'display');
        });

        Validator::extend('trophy_exists', function ($attribute, $value, $parameters, $validator) {
            return \Showcase\Showcase::templatefileExists($value, 'trophy');
        });

        Validator::replacer('display_exists', function ($message, $attribute, $rule, $parameters, $validator) {
            return str_replace([':value'], [$validator->getData()[$attribute]], $message);
        });

        Validator::replacer('trophy_exists', function ($message, $attribute, $rule, $parameters, $validator) {
            return str_replace([':value'], [$validator->getData()[$attribute]], $message);
        });

        if (count(\DB::select(\DB::raw('SHOW TABLES LIKE "' . config('showcase.table_prefix', 'showcase_').'displays"'))) > 0) {
            $displays = \Showcase\App\Display::with('trophies')->get()->filter(function ($display) {
                return \Showcase\Showcase::templateFileExists($display->component_view, 'display');
            });
            $trophies = \Showcase\App\Trophy::all()->filter(function ($trophy) {
                return \Showcase\Showcase::templateFileExists($trophy->component_view, 'trophy');
            });
            View::share('displays', $displays);
            View::share('trophies', $trophies);
        }
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
