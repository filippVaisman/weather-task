<?php

namespace App\Providers;

use App\Business\Services\ApiCacheService;
use App\Business\Services\Interfaces\IApiCacheService;
use App\Business\Services\Interfaces\IApiHttpService;
use App\Business\Services\Interfaces\IWeatherService;
use App\Business\Services\SimpleApiHttpService;
use App\Business\Services\SimpleWeatherService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $bindings = [
        IApiHttpService::class => SimpleApiHttpService::class,
        IWeatherService::class => SimpleWeatherService::class,
        IApiCacheService::class => ApiCacheService::class
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
