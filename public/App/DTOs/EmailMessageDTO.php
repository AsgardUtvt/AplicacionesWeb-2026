<?php
namespace App\DTOs;

use InvalidArgumentException;

class EmailMessageDTO {


    public function __construct(
        private readonly string $from = trim((string) (getenv('EMAIL_USER') ?: $_ENV['EMAIL_USER'] ?? ''), " \t\n\r\0\x0B\"'"),
        private readonly string $to,
        private readonly string $subject,
        private readonly string $body
    )
    {
        $this->validate();
    }

    public function validate(): void
    {
        if(empty(trim($this->from)) ||empty(trim($this->to)) ||empty(trim($this->subject)) ||empty(trim($this->body)))
        {
            throw new InvalidArgumentException("Todos los campos son abligatorios");
        }
        if(!filter_var($this->from, FILTER_VALIDATE_EMAIL))
        {
            throw new InvalidArgumentException("Email de origen invalido");
        }
        if(!filter_var($this->to, FILTER_VALIDATE_EMAIL))
        {
            throw new InvalidArgumentException("Email de destino invalido");
        }
    }

    public function getFrom(): string { return $this->from;}
    public function getTo(): string { return $this->to;}
    public function getSubject(): string { return $this->subject;}
    public function getBody(): string { return $this->body;}
}

