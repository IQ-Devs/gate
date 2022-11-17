<?php

namespace App\Providers;

use  Illuminate\Support\Facades\Schema; // At the top of your file
use Illuminate\Support\Facades\URL;
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
        //
        Schema::defaultStringLength(191);
        if (env('APP ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
