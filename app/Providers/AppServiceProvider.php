<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Factories\UserFactory;
use App\Factories\UserFactoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Registrar UserFactory para que se resuelva al inyectar UserFactoryInterface
        $this->app->singleton(UserFactoryInterface::class, UserFactory::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}