<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*-- Auth --*/
        $this->app->bind(
            'App\Http\Interfaces\Api\AuthInterface',
            'App\Http\Repositories\Api\AuthRepository'
        );

        /*-- Products --*/
        $this->app->bind(
            'App\Http\Interfaces\Api\ProductsInterface',
            'App\Http\Repositories\Api\ProductsRepository'
        );
        /*-- Cart --*/
        $this->app->bind(
            'App\Http\Interfaces\Api\CartInterface',
            'App\Http\Repositories\Api\CartRepository'
        );
        /*-- Order --*/
        $this->app->bind(
            'App\Http\Interfaces\Api\OrderInterface',
            'App\Http\Repositories\Api\OrderRepository'
        );
    }


    public function boot()
    {
        //
    }
}
