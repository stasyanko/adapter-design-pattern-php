<?php

namespace App\Adapters\Image;

final class ImageDto
{
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function url(): string
    {
        return $this->url;
    }
}
