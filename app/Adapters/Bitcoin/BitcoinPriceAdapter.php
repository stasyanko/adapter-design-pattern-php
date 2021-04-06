<?php

namespace App\Adapters\Bitcoin;

interface BitcoinPriceAdapter
{
    public function fetchPrice(): ?float;
}
