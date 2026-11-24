<?php
namespace App\Services;

use App\DTOs\EmailMessageDTO;
use App\Factories\MeilerFactory;

class MessageService {
    public static function generarMessageAndSend(readonly  string $from,readonly  string $to,readonly  string $subjet,readonly  string $body) {
        $factory = new MeilerFactory();
        $transport = $factory->create("smtp");

        $emailService = new EmailService($transport);

        $message = new EmailMessageDTO( $from, $to, $subjet, $body);

        $emailService->sendEmail($message);
    }
}
