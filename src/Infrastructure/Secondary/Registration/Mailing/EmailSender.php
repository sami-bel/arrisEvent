<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Registration\Mailing;

use App\Domain\Registration\Mailing\EmailData;
use App\Domain\Registration\Mailing\ISendEmail;
use App\Domain\Registration\Registration;
use Symfony\Component\Mailer\MailerInterface;
use Twig\Environment;
use Symfony\Component\Mime\Email;

class EmailSender implements  ISendEmail
{
    public function __construct(private MailerInterface $mailer, private Environment $twig)
    {
    }

    public function send(Registration $registration, EmailData $emailData): void
    {
        $body =  $this->twig->render(
                $emailData->getTemplate(),
                [
                    'data' => $emailData->getParams($registration),
                ]
            );


        $email = (new Email())
            ->from('samsoum.infor@gmail.com')
            ->to($registration->getUser()->getEmail())
            ->subject($emailData->getSubject())
            ->html($body);

        try {
            $this->mailer->send($email);
        } catch (\Throwable $exception) {
            dump($exception->getMessage());
            die;
        }
    }
}
