<?php

namespace App\Adapters\Invoice;

interface InvoiceGeneratorInterface
{
    /**
     * @param PartyDto $sellerDto
     * @param PartyDto $buyerDto
     * @param InvoiceItemDto[] $invoiceItemDtos
     * @param string $currencyCode
     * @param string $pathToSave
     * @return void
     */
    public function generate(
        PartyDto $sellerDto,
        PartyDto $buyerDto,
        array $invoiceItemDtos,
        string $currencyCode,
        string $pathToSave
    ): void;
}
