<?php

namespace App\Adapters\Email;

interface EmailClientInterface
{
    public function send(
        string $toAddress,
        string $subject,
        string $message
    ): void;
}
