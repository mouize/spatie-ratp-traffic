<?php

namespace TrafficRatp;

use Illuminate\Support\ServiceProvider;
use TrafficRatp\Console\Traffic;

class RatpTrafficServiceProvider extends ServiceProvider
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
            __DIR__.'/assets' => public_path('vendor/ratptraffic'),
        ], 'public');
    }
}
