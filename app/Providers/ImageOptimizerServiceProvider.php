<?php

namespace App\Providers;

use App\Adapters\ImageOptimizer\CloudinaryApiAdapter;
use App\Adapters\ImageOptimizer\ImageOptimizerAdapter;
use Illuminate\Support\ServiceProvider;
use ImageOptim\API;

class ImageOptimizerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageOptimizerAdapter::class, function($app){
            return new CloudinaryApiAdapter(
                new API(config('services.imageoptim.api_key'))
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
