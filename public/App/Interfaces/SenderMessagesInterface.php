<?php
namespace App\Interfaces;

use App\DTOs\EmailMessageDTO;

/**
 * Interface Interfaces
 * @author yourname
 */
interface SenderMessagesInterface
{
    public function sendMessage(EmailMessageDTO $message): void;
}
