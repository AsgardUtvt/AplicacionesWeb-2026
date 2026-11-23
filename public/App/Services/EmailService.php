<?php
namespace App\Services;

use App\DTOs\EmailMessageDTO;
use App\Interfaces\SenderMessagesInterface;

class EmailService {

    private SenderMessagesInterface $sender;

    public function __construct(SenderMessagesInterface $sender)
    {
        $this->sender = $sender;
    }

    public function sendEmail(EmailMessageDTO $message): void {
        $this->sender->sendMessage($message);
    }

}

