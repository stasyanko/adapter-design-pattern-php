<?php

namespace App\Adapters\IpGeolocation\IpStack;

interface IpStackInterface
{
    public function getUserDataByIp(string $ip): ?array;
}
