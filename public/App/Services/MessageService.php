<?php
namespace App\Services;

use App\DTOs\EmailMessageDTO;
use App\Factories\MeilerFactory;

class MessageService {
    public static function generarMessageAndSend( string $to, string $subjet, string $body) {
        $factory = new MeilerFactory();
        $transport = $factory->create("smtp");

        $emailService = new EmailService($transport);

        $message = new EmailMessageDTO(  to: $to, subject: $subjet,   body: $body);

        $emailService->sendEmail($message);
    }
}
