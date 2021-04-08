<?php

namespace App\Adapters\News;

use RuntimeException;
use DateTime;

interface NewsClientInterface
{
    /**
     * @param string $query
     * @param DateTime $fromDate
     * @param int $limit
     * @return NewsDto[]
     *
     * @throws RuntimeException
     */
    public function search(
        string $query,
        DateTime $fromDate,
        int $limit
    ): array;
}
