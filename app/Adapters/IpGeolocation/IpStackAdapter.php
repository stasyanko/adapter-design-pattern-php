<?php

namespace App\Adapters\IpGeolocation;

use App\Adapters\IpGeolocation\IpStack\IpStackInterface;

class IpStackAdapter implements IpGeolocationInterface
{
    private IpStackInterface $ipStack;

    public function __construct(IpStackInterface $ipStack)
    {
        $this->ipStack = $ipStack;
    }

    public function geoDataFromIp(string $ip): ?GeoDataDto
    {
        $userData = $this->ipStack->getUserDataByIp($ip);

        if($userData === null) {
            return null;
        }

        return new GeoDataDto(
            $userData['continent_name'],
            $userData['country_name'],
            $userData['city'],
            $userData['latitude'],
            $userData['longitude'],
        );
    }
}
