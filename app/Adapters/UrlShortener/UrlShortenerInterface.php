<?php

namespace App\Adapters\UrlShortener;

use RuntimeException;

interface UrlShortenerInterface
{
    /**
     * @param string $url
     * @return string
     *
     * @throws RuntimeException
     */
    public function makeShortUrl(string $url): string;
}
