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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            \App\Domain\Interfaces\AgreementRepository::class,
            \App\Domain\Repositories\AgreementRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Domain\Interfaces\CustomerRepository::class,
            \App\Domain\Repositories\CustomerRepositoryEloquent::class
        );
        //:end-bindings:
    }
}
