<?php

namespace App\Adapters\ImageOptimizer;

final class ImageQualityValues
{
    const LOW = 'low';
    const MEDIUM = 'medium';
    const HIGH = 'high';

    public static function isValid(string $imageQuality): bool
    {
        return in_array($imageQuality, [
            self::LOW,
            self::MEDIUM,
            self::HIGH,
        ]);
    }
}
