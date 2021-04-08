<?php

namespace App\Adapters\News\NewsApi;

use GuzzleHttp\Exception\GuzzleException;
use DateTime;

interface NewsApiClientInterface
{
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
    ): array;
}
