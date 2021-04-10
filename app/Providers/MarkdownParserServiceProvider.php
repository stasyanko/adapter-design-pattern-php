<?php

namespace App\Providers;

use App\Adapters\Markdown\MarkdownParserInterface;
use App\Adapters\Markdown\ParsedownAdapter;
use Parsedown;
use Illuminate\Support\ServiceProvider;

class MarkdownParserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MarkdownParserInterface::class, function($app){
            return new ParsedownAdapter(new Parsedown());
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
