<?php

namespace App\Adapters\Invoice;

use RuntimeException;

interface InvoiceGeneratorInterface
{
    /**
     * @param PartyDto $sellerDto
     * @param PartyDto $buyerDto
     * @param InvoiceItemDto[] $invoiceItemDtos
     * @param string $currencyCode
     * @param string $currencySymbol
     * @param string $fileName
     * @return void
     *
     * @throws RuntimeException
     */
    public function generate(
        PartyDto $sellerDto,
        PartyDto $buyerDto,
        array $invoiceItemDtos,
        string $currencyCode,
        string $currencySymbol,
        string $fileName
    ): void;
}
