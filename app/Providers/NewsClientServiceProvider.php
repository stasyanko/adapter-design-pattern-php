<?php

namespace App\Providers;

use App\Adapters\News\NewsApi\NewsApiClient;
use App\Adapters\News\NewsApiClientAdapter;
use App\Adapters\News\NewsClientInterface;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class NewsClientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewsClientInterface::class, function($app){
            $newsApi = new NewsApiClient(
                new Client(),
                config('services.news_api.api_key')
            );
            return new NewsApiClientAdapter($newsApi);
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
