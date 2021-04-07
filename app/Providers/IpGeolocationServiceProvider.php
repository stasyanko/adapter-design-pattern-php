<?php

namespace App\Providers;

use App\Adapters\IpGeolocation\IpGeolocationInterface;
use App\Adapters\IpGeolocation\IpStack\IpStackApi;
use App\Adapters\IpGeolocation\IpStackAdapter;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class IpGeolocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IpGeolocationInterface::class, function($app){
            return new IpStackAdapter(new IpStackApi(
                new Client(),
                config('services.ipstack.access_key')
            ));
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
