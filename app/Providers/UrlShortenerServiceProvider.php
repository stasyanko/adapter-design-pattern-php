<?php

namespace App\Providers;

use App\Adapters\UrlShortener\BitlyApiAdapter;
use App\Adapters\UrlShortener\UrlShortenerInterface;
use Illuminate\Support\ServiceProvider;
use PHPLicengine\Api\Api;
use PHPLicengine\Service\Bitlink;

class UrlShortenerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UrlShortenerInterface::class, function($app){
            $api = new Api(config('services.bitly.api_key'));
            $bitlink = new Bitlink($api);

            return new BitlyApiAdapter($api, $bitlink);
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
