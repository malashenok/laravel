<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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

        \Validator::extend('covid', function($attribute, $value, $parameters, $validator) {

            if (strstr(strtolower($value), 'covid')) {
                return false;
            } else {
                return true;
            }
        });

        $this->app->singleton(\Faker\Generator::class, function() {
           return \Faker\Factory::create('ru_RU');
        });
    }
}
