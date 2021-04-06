<?php

namespace App\Adapters\Weather;

interface WeatherProviderAdapter
{
    public function currentWeather(float $lat, float $lon): ?WeatherDataDto;
}
