<?php

namespace Joelsonm\Correios\Providers;

use Illuminate\Support\ServiceProvider;
use Joelsonm\Correios\Correios;

class CorreiosServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
           __DIR__.'/../config/correios.php' => config_path('correios.php'),
       ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Joelsonm\Correios', function ($app) {
            return new Correios();
        });
    }
}
