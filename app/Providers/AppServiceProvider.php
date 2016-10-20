<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('is_youtube_link', function($attribute, $value, $parameters, $validator) {

            if (strpos($value, 'youtube.com') !== false || strpos($value, 'youtu.be') !== false) {
                return true;
            }

            return false;

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
