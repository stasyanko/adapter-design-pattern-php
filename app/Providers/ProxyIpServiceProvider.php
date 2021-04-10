<?php

namespace App\Providers;

use App\Adapters\ProxyIp\ArrayProxyIp\ArrayProxyIpService;
use App\Adapters\ProxyIp\ArrayProxyIpAdapter;
use App\Adapters\ProxyIp\ProxyIpInterface;
use Illuminate\Support\ServiceProvider;

class ProxyIpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProxyIpInterface::class, function($app){
            return new ArrayProxyIpAdapter(
                new ArrayProxyIpService(config('ip_proxies.all'))
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
