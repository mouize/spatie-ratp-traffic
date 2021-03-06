<?php

namespace RatpTraffic;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use RatpTraffic\Console\Traffic;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Traffic::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/assets' => resource_path('assets'),
        ], 'public');

        $this->publishes([
            __DIR__.'/public' => public_path(),
        ], 'public');
    }
}
