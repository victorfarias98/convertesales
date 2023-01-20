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
        $this->app->bind('App\Repositories\Contracts\SaleRepositoryInterface',
            'App\Repositories\SaleRepository'
        );
        $this->app->bind('App\Repositories\Contracts\UnitRepositoryInterface',
            'App\Repositories\UnitRepository'
        );
        $this->app->bind('App\Repositories\Contracts\AreaRepositoryInterface',
            'App\Repositories\AreaRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
