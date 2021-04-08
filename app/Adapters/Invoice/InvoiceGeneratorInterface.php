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
     * @param string $pathToSave
     * @return void
     *
     * @throws RuntimeException
     */
    public function generate(
        PartyDto $sellerDto,
        PartyDto $buyerDto,
        array $invoiceItemDtos,
        string $currencyCode,
        string $pathToSave
    ): void;
}
