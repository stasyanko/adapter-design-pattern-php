<?php

namespace App\Adapters\ImageOptimizer;

use Illuminate\Support\Str;

class CloudinaryApiAdapter implements ImageOptimizerAdapter
{
    public function __construct(
    {
        $this->api = $api;
    }

    public function optimize(
        string $imageUrl,
        int $width,
        string $quality
    ): string
    {
        if (ImageQualityValues::isValid($quality) === false) {
            throw new \InvalidArgumentException('Image quality has wrong value: ' . $quality);
        }

        $imageData = $this->api->imageFromURL($imageUrl)
            ->quality($quality)
            ->resize($width)
            ->getBytes();

        $imageExtension = $this->imageExtensionFromUrl($imageUrl);
        $resImagePath = $this->makeRandomImageNameWithPath($imageExtension);

        file_put_contents(
            $resImagePath,
            $imageData
        );

        return $resImagePath;
    }

    private function makeRandomImageNameWithPath(string $extension): string
    {
        return public_path(Str::uuid() . '.' . $extension);
    }

    private function imageExtensionFromUrl(string $url): string
    {
        return pathinfo(
            parse_url($url, PHP_URL_PATH),
            PATHINFO_EXTENSION
        );
    }
}
