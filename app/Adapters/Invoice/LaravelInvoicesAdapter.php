<?php

namespace App\Adapters\Invoice;

use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Invoice;

class LaravelInvoicesAdapter implements InvoiceGeneratorInterface
{
    private Invoice $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }


    /**
     * {@inheritDoc}
     */
    public function generate(
        PartyDto $sellerDto,
        PartyDto $buyerDto,
        array $invoiceItemDtos,
        string $currencyCode,
        string $pathToSave
    ): void
    {
        $buyer = new Party([
            'name' => $buyerDto->name(),
            'phone' => $buyerDto->phone(),
        ]);
        $seller = new Party([
            'name' => $sellerDto->name(),
            'phone' => $sellerDto->phone(),
        ]);

        $invoice = $this->invoice
            ->buyer($buyer)
            ->seller($seller);

        foreach ($invoiceItemDtos as $invoiceItemDto) {
            $item = (new InvoiceItem())
                ->title($invoiceItemDto->title())
                ->pricePerUnit($invoiceItemDto->pricePerUnit())
                ->quantity($invoiceItemDto->quantity())
                ->discount($invoiceItemDto->discount());

            $invoice->addItem($item);
        }

        $invoice->currencyCode($currencyCode)
            ->render();
    }
}
