<?php
namespace App\Transports;

use App\Interfaces\SenderMessagesInterface;
use App\DTOs\EmailMessageDTO;
use InvalidArgumentException;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class SmtpMailer implements SenderMessagesInterface {
    
    private MailerInterface $mailer;
    private string $authUser;

    public function __construct()
    {
        $user = trim((string) (getenv('EMAIL_USER') ?: $_ENV['EMAIL_USER'] ?? ''));
        $pass = trim((string) (getenv('EMAIL_PASS') ?: $_ENV['EMAIL_PASS'] ?? ''));
        echo "<pre>";
        echo $user;
        echo $pass;
        echo "</pre>";


        if(empty($user) || empty($pass)){
            throw new InvalidArgumentException("Faltan credenciales de correo en las variables de entorno");
        }
        $dsn = sprintf('smtps://%s:%s@smtp.gmail.com', rawurlencode($user), rawurlencode($pass));
        $this->mailer = new Mailer(Transport::fromDsn($dsn));
        $this->authUser = $user;
    }

    public function sendMessage(EmailMessageDTO $message): void
    {


        $email = (new Email())
            ->from($message->getFrom() ?: $this->authUser)
            ->to($message->getTo ())
            ->subject($message->getSubject())
            ->html($message->getBody());

        $this->mailer->send($email); 
    }
}
