<?php

namespace App\Providers;

use App\Adapters\Email\EmailAdapter;
use App\Adapters\Email\MailgunEmailAdapter;
use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmailAdapter::class, function($app){
            return new MailgunEmailAdapter(
                config('services.mailgun.secret'),
                config('services.mailgun.domain'),
                config('mail.from.address'),
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
