<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\SextoRepository;
use App\Repositories\SextoRepositoryInterface;
use App\Services\SextoService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SextoRepositoryInterface::class, SextoRepository::class);
        $this->app->bind(SextoService::class, function ($app) {
            return new SextoService($app->make(SextoRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
