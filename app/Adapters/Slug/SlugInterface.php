<?php

namespace App\Adapters\Slug;

interface SlugInterface
{
    public function generate(string $text): string;
}
