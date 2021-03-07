<?php

declare(strict_types=1);

namespace App\Domain\Registration\Action;

use App\Domain\Registration\Registration;

class UserConfirmRegistrationAction implements Action
{
    public function execute(Registration $registration): void
    {
        if (Registration::STATUS_ACCEPTED === $registration->getStatus()) {
            $registration->setStatus(Registration::STATUS_CONFIRMED_BY_USER);
        }
    }
}
