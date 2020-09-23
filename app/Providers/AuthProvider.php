<?php

namespace App\Providers;

use App\Adapters\Cosmic\Auth\AuthInterface;
use Illuminate\Support\ServiceProvider;

class AuthProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuthInterface::class,
            \App\Adapters\Cosmic\Auth\AuthProvider::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
