<?php

namespace App\Adapters\News\NewsApi;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use DateTime;

class NewsApiClient implements NewsApiClientInterface
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

    /**
     * @param string $query
     * @param DateTime $fromDate
     * @param DateTime $toDate
     * @param int $pageSize
     * @param int $page
     * @return array
     *
     * @throws GuzzleException
     */
    public function getEverything(
        string $query,
        DateTime $fromDate,
        DateTime $toDate,
        int $pageSize,
        int $page
    ): array
    {
        $fromDateFormatted = $fromDate->format(DateTime::ISO8601);
        $toDateFormatted = $toDate->format(DateTime::ISO8601);

        $response = $this->client->request(
            'GET',
            "https://newsapi.org/v2/everything?q={$query}&apiKey={$this->apiKey}&from={$fromDateFormatted}&to={$toDateFormatted}&pageSize={$pageSize}&page={$page}",
        );

        $data = json_decode($response->getBody()->getContents(), true);

        return $data['articles'];
    }
}
