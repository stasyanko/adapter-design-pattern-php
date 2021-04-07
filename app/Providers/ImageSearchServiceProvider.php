<?php

namespace App\Providers;

use App\Adapters\Image\ImageSearchInterface;
use App\Adapters\Image\Pixabay\PixabayApi;
use App\Adapters\Image\PixabayApiAdapter;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class ImageSearchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageSearchInterface::class, function($app){
            return new PixabayApiAdapter(new PixabayApi(
                new Client(),
                config('services.pixabay.api_key')
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
