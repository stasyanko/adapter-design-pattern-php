<?php

namespace App\Adapters\IpGeolocation;

final class GeoDataDto
{
    private string $continentName;
    private string $countryName;
    private string $city;
    private float $latitude;
    private float $longitude;

    public function __construct(
        string $continentName,
        string $countryName,
        string $city,
        float $latitude,
        float $longitude
    )
    {
        $this->continentName = $continentName;
        $this->countryName = $countryName;
        $this->city = $city;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function continentName(): string
    {
        return $this->continentName;
    }

    public function countryName(): string
    {
        return $this->countryName;
    }

    public function city(): string
    {
        return $this->city;
    }

    public function latitude(): float
    {
        return $this->latitude;
    }

    public function longitude(): float
    {
        return $this->longitude;
    }
}
