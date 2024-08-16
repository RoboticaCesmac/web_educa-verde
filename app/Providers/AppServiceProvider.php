<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\SextoRepository;
use App\Repositories\SetimoRepository;
use App\Repositories\OitavoRepository;
use App\Repositories\NonoRepository;
use App\Repositories\SextoRepositoryInterface;
use App\Repositories\SetimoRepositoryInterface;
use App\Repositories\OitavoRepositoryInterface;
use App\Repositories\NonoRepositoryInterface;
use App\Services\SextoService;
use App\Services\SetimoService;
use App\Services\OitavoService;
use App\Services\NonoService;

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

        $this->app->bind(SetimoRepositoryInterface::class, SetimoRepository::class);
        $this->app->bind(SetimoService::class, function ($app) {
            return new SetimoService($app->make(SetimoRepositoryInterface::class));
        });

        $this->app->bind(OitavoRepositoryInterface::class, OitavoRepository::class);
        $this->app->bind(OitavoService::class, function ($app) {
            return new OitavoService($app->make(OitavoRepositoryInterface::class));
        });

        $this->app->bind(NonoRepositoryInterface::class, NonoRepository::class);
        $this->app->bind(NonoService::class, function ($app) {
            return new NonoService($app->make(NonoRepositoryInterface::class));
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
