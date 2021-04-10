<?php

namespace App\Adapters\ProxyIp;

use App\Adapters\ProxyIp\ArrayProxyIp\ArrayProxyIpInterface;

class ArrayProxyIpAdapter implements ProxyIpInterface
{
    private ArrayProxyIpInterface $arrayProxyIp;

    public function __construct(ArrayProxyIpInterface $arrayProxyIp)
    {
        $this->arrayProxyIp = $arrayProxyIp;
    }

    public function random(): string
    {
        $allProxyIps = $this->arrayProxyIp->all();
        $randomProxyIpKey = array_rand($allProxyIps);

        return $allProxyIps[$randomProxyIpKey];
    }
}
