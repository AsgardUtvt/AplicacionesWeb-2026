<?php
namespace App\Factories;

use App\Interfaces\SenderMessagesInterface;
use App\Transports\SmtpMailer;
use InvalidArgumentException;

class MeilerFactory {

        public function create(string $provider): SenderMessagesInterface {
            return match($provider) {
                'smtp' => new SmtpMailer(), 

                default => throw new InvalidArgumentException("Proveedor no soportado")
            };
        }
} 
