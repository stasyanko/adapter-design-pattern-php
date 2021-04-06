<?php

namespace App\Adapters\Weather;

use InvalidArgumentException;

interface WeatherProviderAdapter
{
    /**
     * @param float $lat
     * @param float $lon
     * @return WeatherDataDto|null
     *
     * @throws InvalidArgumentException
     */
    public function currentWeather(float $lat, float $lon): ?WeatherDataDto;
}
