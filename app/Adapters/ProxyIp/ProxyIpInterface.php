<?php

namespace App\Adapters\ProxyIp;

interface ProxyIpInterface
{
    /**
     * Get a random proxy IP
     *
     * @return string
     */
    public function random(): string;
}
