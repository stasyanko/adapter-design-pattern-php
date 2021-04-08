<?php

namespace App\Adapters\UrlShortener;

use PHPLicengine\Api\Api;
use PHPLicengine\Service\Bitlink;
use RuntimeException;

class BitlyApiAdapter implements UrlShortenerInterface
{
    private Bitlink $bitlink;
    private Api $api;

    public function __construct(
        Api $api,
        Bitlink $bitlink
    )
    {
        $this->bitlink = $bitlink;
        $this->api = $api;
    }

    public function makeShortUrl(string $url): string
    {
        $result = $this->bitlink->createBitlink(['long_url' => $url]);

        if (
            $this->api->isCurlError() ||
            $result->isError() ||
            $result->isSuccess() === false
        ) {
            throw new RuntimeException('Bitly error occurred');
        }

        return $result->getResponseArray()['link'];
    }
}
