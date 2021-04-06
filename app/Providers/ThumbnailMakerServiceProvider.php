<?php

namespace App\Providers;

use App\Adapters\Thumbnail\CloudinaryApiAdapter;
use App\Adapters\Thumbnail\ThumbnailMakerAdapter;
use Illuminate\Support\ServiceProvider;

class ThumbnailMakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ThumbnailMakerAdapter::class, function($app){
            return new CloudinaryApiAdapter();
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
