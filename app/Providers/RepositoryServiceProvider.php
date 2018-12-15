<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SpiecieRepository::class, \App\Repositories\SpiecieRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RecordRepository::class, \App\Repositories\RecordRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NicheRepository::class, \App\Repositories\NicheRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NicheRepository::class, \App\Repositories\NicheRepositoryEloquent::class);
        //:end-bindings:
    }
}
