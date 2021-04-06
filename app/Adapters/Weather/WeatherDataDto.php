<?php

declare(strict_types=1);

namespace App\Adapters\Weather;

final class WeatherDataDto
{
    private string $description;
    private float $temperature;
    private int $pressure;
    private int $humidity;

    public function __construct(
        string $description,
        float $temperature,
        int $pressure,
        int $humidity
    )
    {
        $this->description = $description;
        $this->temperature = $temperature;
        $this->pressure = $pressure;
        $this->humidity = $humidity;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function temperature(): float
    {
        return $this->temperature;
    }

    public function pressure(): int
    {
        return $this->pressure;
    }

    public function humidity(): int
    {
        return $this->humidity;
    }
}
