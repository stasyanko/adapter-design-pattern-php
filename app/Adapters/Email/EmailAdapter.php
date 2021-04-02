<?php


namespace App\Adapters\Email;


interface EmailAdapter
{
    public function send(
        string $toAddress,
        string $subject,
        string $message
    ): void;
}
