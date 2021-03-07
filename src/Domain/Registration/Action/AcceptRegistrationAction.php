<?php

declare(strict_types=1);

namespace App\Domain\Registration\Action;

use App\Domain\Registration\Mailing\EmailData;
use App\Domain\Registration\Mailing\ISendEmail;
use App\Domain\Registration\Registration;

class AcceptRegistrationAction implements Action
{
    public function __construct(private ISendEmail $emailSender, private EmailData $emailData)
    {
    }

    public function execute(Registration $registration): void
    {
        if (Registration::STATUS_SELECTED === $registration->getStatus()) {
            $registration->setStatus(Registration::STATUS_ACCEPTED);
            $this->emailSender->send($registration, $this->emailData);
        }
    }
}
