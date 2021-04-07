<?php

namespace App\Adapters\Image;

use App\Adapters\Image\Pixabay\PixabayApiInterface;
use RuntimeException;

class PixabayApiAdapter implements ImageSearchInterface
{
    private PixabayApiInterface $pixabayApi;

    public function __construct(PixabayApiInterface $pixabayApi)
    {
        $this->pixabayApi = $pixabayApi;
    }

    public function search(string $query, int $maxResults): array
    {
        $pixabayImages = $this->pixabayApi->search($query, $maxResults, true);

        if($pixabayImages === null) {
            throw new RuntimeException('A server error occurred fetching images');
        }

        /** @var ImageDto[] $resCollection */
        $resCollection = [];

        foreach ($pixabayImages['hits'] as $pixabayImage) {
            $resCollection[] = new ImageDto($pixabayImage['webformatURL']);
        }

        return $resCollection;
    }
}
