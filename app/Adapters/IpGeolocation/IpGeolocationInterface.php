<?php

namespace App\Adapters\IpGeolocation;

interface IpGeolocationInterface
{
    public function geoDataFromIp(string $ip): ?GeoDataDto;
}
