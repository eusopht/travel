<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::if('routeis', function ($expression) {
            foreach ($expression as $route) {
                if(fnmatch($route, Route::currentRouteName())) {
                    return fnmatch($route, Route::currentRouteName());
                }
            }
            // return fnmatch($expression, Route::currentRouteName());
        });
    }
}
