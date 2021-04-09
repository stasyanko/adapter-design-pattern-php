<?php

namespace App\Adapters\Slug;

use Ausi\SlugGenerator\SlugGeneratorInterface;

class AusiLibraryAdapter implements SlugInterface
{
    private SlugGeneratorInterface $slugGenerator;

    public function __construct(SlugGeneratorInterface $slugGenerator)
    {
        $this->slugGenerator = $slugGenerator;
    }

    public function generate(string $text): string
    {
        return $this->slugGenerator->generate($text);
    }
}
