<?php

namespace App\Providers;

use App\Adapters\Bitcoin\BitcoinPriceInterface;
use App\Adapters\Bitcoin\CoinmarketcapAdapter;
use Illuminate\Support\ServiceProvider;

class BitcoinPriceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BitcoinPriceInterface::class, function($app){
            return new CoinmarketcapAdapter(config('services.coinmarketcap.api_key'));
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
