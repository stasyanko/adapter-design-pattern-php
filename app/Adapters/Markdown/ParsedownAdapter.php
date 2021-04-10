<?php

namespace App\Adapters\Markdown;

use Parsedown;

class ParsedownAdapter implements MarkdownParserInterface
{
    private Parsedown $parsedown;

    public function __construct(Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }

    public function toHtml(string $markdown, bool $safeMode): string
    {
        $this->parsedown->setSafeMode($safeMode);
        return $this->parsedown->text($markdown);
    }
}
