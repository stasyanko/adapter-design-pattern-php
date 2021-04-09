<?php

namespace App\Providers;

use App\Adapters\Slug\AusiLibraryAdapter;
use App\Adapters\Slug\SlugInterface;
use Ausi\SlugGenerator\SlugGenerator;
use Ausi\SlugGenerator\SlugOptions;
use Illuminate\Support\ServiceProvider;

class SlugGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SlugInterface::class, function($app){
            return new AusiLibraryAdapter(
                new SlugGenerator(
                    (new SlugOptions())
                        ->setValidChars('a-zA-Z0-9')
                        ->setLocale('en')
                        ->setDelimiter('-')
                )
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
