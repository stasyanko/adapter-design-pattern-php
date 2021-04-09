<?php

namespace App\Adapters\Invoice;

use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Invoice;
use RuntimeException;
use Exception;

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
        string $fileName
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
            try {
                $item = (new InvoiceItem())
                    ->title($invoiceItemDto->title())
                    ->pricePerUnit($invoiceItemDto->pricePerUnit())
                    ->quantity($invoiceItemDto->quantity())
                    ->discount($invoiceItemDto->discount());
            } catch (Exception $e) {
                throw new RuntimeException($e->getMessage());
            }

            $invoice->addItem($item);
        }

        try {
            $invoice->currencyCode($currencyCode)
                ->filename($fileName)
                ->save('public');
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage());
        }
    }
}
