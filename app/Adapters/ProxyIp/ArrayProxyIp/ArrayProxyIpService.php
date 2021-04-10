<?php

namespace App\Adapters\ProxyIp\ArrayProxyIp;

class ArrayProxyIpService implements ArrayProxyIpInterface
{
    private array $proxyIpList;

    /**
     * ArrayProxyIpService constructor.
     * @param string[] $proxyIpList
     */
    public function __construct(array $proxyIpList)
    {
        $this->proxyIpList = $proxyIpList;
    }

    public function all(): array
    {
        return $this->proxyIpList;
    }
}
