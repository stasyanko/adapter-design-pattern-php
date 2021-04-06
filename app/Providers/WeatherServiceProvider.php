<?php

namespace App\Providers;

use App\Adapters\Weather\OpenweathermapAdapter;
use App\Adapters\Weather\WeatherProviderAdapter;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WeatherProviderAdapter::class, function($app){
            return new OpenweathermapAdapter(
                new Client(),
                config('services.openweathermap.api_key')
            );
        });
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
