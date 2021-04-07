<?php

namespace App\Adapters\Image\Pixabay;

interface PixabayApiInterface
{
    public function search(
        string $query,
        int $perPage,
        bool $safeSearch
    ): ?array;
}
