<?php

namespace App\Providers;

use App\Service\CompositionService;
use Illuminate\Http\Request;
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
        $this->app->bind(CompositionService::class, fn() => CompositionService::initiate(request()->url()));

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Request::macro('isPreflight', function () {
            return $this->header('x-custom-header')  === 'preflight';
        });
    }
}
