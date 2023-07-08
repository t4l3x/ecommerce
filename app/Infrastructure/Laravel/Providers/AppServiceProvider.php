<?php

namespace App\Infrastructure\Laravel\Providers;

use App\Domain\IdentityAccess\User\Repository\UserRepositoryInterface;
use App\Domain\Product\Repository\IProductRepository;
use App\Domain\Product\Repository\ProductRepositoryInterface;
use App\Infrastructure\Product\Repository\ProductRepository;
use App\Infrastructure\User\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        //
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            'App\Domain\IdentityAccess\Auth\Services\TokenService',
            'App\Infrastructure\Auth\Services\LaravelTokenService'
        );

        $this->app->bind(
            IProductRepository::class,
            ProductRepository::class
        );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
