<?php

namespace App\Adapters\IpGeolocation\IpStack;

use GuzzleHttp\ClientInterface;

class IpStackApi implements IpStackInterface
{
    private ClientInterface $client;
    private string $accessKey;

    public function __construct(
        ClientInterface $client,
        string $accessKey
    )
    {
        $this->client = $client;
        $this->accessKey = $accessKey;
    }

    public function getUserDataByIp(string $ip): ?array
    {
        $response = $this->client->request(
            'GET',
            "http://api.ipstack.com/{$ip}?access_key={$this->accessKey}",
            ['http_errors' => false]
        );

        if ($response->getStatusCode() !== 200) {
            return null;
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}
