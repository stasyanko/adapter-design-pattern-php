<?php

namespace App\Adapters\Email;

use Mailgun\Mailgun;

class MailgunEmailAdapter implements EmailClientInterface
{
    private string $apiKey;
    private string $domain;
    private string $fromAddress;

    public function __construct(
        string $apiKey,
        string $domain,
        string $fromAddress
    )
    {
        $this->apiKey = $apiKey;
        $this->domain = $domain;
        $this->fromAddress = $fromAddress;
    }

    public function send(string $toAddress, string $subject, string $message): void
    {
        $mg = Mailgun::create($this->apiKey);
        $mg->messages()->send($this->domain, [
            'from'    => $this->fromAddress,
            'to'      => $toAddress,
            'subject' => $subject,
            'text'    => $message,
        ]);
    }
}
