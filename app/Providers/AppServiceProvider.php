<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('date_greater_than', function($attribute, $value, $parameters, $validator) {
            $inserted = Carbon::parse($value)->year;
            $since = $parameters[0];
            return $inserted >= $since && $inserted<= Carbon::now()->year;
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
