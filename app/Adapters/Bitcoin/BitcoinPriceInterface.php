<?php

namespace App\Adapters\Bitcoin;

interface BitcoinPriceInterface
{
    public function fetchPrice(): ?float;
}
