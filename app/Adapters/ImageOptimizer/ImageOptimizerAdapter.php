<?php

namespace App\Adapters\ImageOptimizer;

use App\Exceptions\ImageOptimizationError;
use InvalidArgumentException;

interface ImageOptimizerAdapter
{
    /**
     * Optimizes and image and returns a new path to the optimized image
     *
     * @param string $imageUrl
     * @param int $width
     * @param string $quality
     * @return string a new path to the optimized image
     *
     * @throws InvalidArgumentException
     * @throws ImageOptimizationError
     */
    public function optimize(string $imageUrl, int $width, string $quality): string;
}
