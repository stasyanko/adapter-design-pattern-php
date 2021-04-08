<?php

namespace App\Adapters\News;

use DateTime;

final class NewsDto
{
    private string $source;
    private string $author;
    private string $title;
    private string $description;
    private string $content;
    private string $url;
    private DateTime $publishedAt;

    public function __construct(
        string $source,
        string $author,
        string $title,
        string $description,
        string $content,
        string $url,
        DateTime $publishedAt
    )
    {
        $this->source = $source;
        $this->author = $author;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->url = $url;
        $this->publishedAt = $publishedAt;
    }

    public function source(): string
    {
        return $this->source;
    }

    public function author(): string
    {
        return $this->author;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function content(): string
    {
        return $this->content;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function publishedAt(): DateTime
    {
        return $this->publishedAt;
    }
}
