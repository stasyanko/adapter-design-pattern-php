<?php

namespace App\Adapters\Image;

use RuntimeException;

interface ImageSearchInterface
{
    /**
     * @param string $query
     * @param int $maxResults
     * @return ImageDto[]
     *
     * @throws RuntimeException
     */
    public function search(string $query, int $maxResults): array;
}
