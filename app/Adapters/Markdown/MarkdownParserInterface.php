<?php

namespace App\Adapters\Markdown;

interface MarkdownParserInterface
{
    public function toHtml(string $markdown, bool $safeMode): string;
}
