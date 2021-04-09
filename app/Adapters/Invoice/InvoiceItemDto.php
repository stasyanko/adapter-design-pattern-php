<?php

namespace App\Adapters\Invoice;

final class InvoiceItemDto
{
    private string $title;
    private float $pricePerUnit;
    private int $quantity;
    private int $discount;

    public function __construct(
        string $title,
        float $pricePerUnit,
        int $quantity,
        int $discount
    )
    {
        $this->title = $title;
        $this->pricePerUnit = $pricePerUnit;
        $this->quantity = $quantity;
        $this->discount = $discount;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function pricePerUnit(): float
    {
        return $this->pricePerUnit;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function discount(): int
    {
        return $this->discount;
    }
}
