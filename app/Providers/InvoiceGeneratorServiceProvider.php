<?php

namespace App\Providers;

use App\Adapters\Invoice\InvoiceGeneratorInterface;
use App\Adapters\Invoice\LaravelInvoicesAdapter;
use Illuminate\Support\ServiceProvider;
use LaravelDaily\Invoices\Invoice;

class InvoiceGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InvoiceGeneratorInterface::class, function($app){
            return new LaravelInvoicesAdapter(new Invoice());
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
