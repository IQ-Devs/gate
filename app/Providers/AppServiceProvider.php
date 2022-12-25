<?php

namespace App\Providers;

use App\Interfaces\CellProviderInterface;
use App\Repositories\AsiacellProvider;
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
//        $this->app->bind(CellProviderInterface::class, AsiacellProvider::class);


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
