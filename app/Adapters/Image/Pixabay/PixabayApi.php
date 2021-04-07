<?php

namespace App\Adapters\Image\Pixabay;

use GuzzleHttp\ClientInterface;

class PixabayApi implements PixabayApiInterface
{
    private ClientInterface $client;
    private string $apiKey;

    public function __construct(
        ClientInterface $client,
        string $apiKey
    )
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    public function search(
        string $query,
        int $perPage,
        bool $safeSearch
    ): ?array
    {
        $response = $this->client->request(
            'GET',
            "https://pixabay.com/api/?key={$this->apiKey}&q={$query}&safesearch={$safeSearch}&per_page={$perPage}",
            ['http_errors' => false]
        );

        if ($response->getStatusCode() !== 200) {
            return null;
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}
