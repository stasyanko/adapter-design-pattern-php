<?php

namespace App\Adapters\Invoice;

final class PartyDto
{
    private string $name;
    private string $phone;

    public function __construct(
        string $name,
        string $phone
    )
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function phone(): string
    {
        return $this->phone;
    }
}
