<?php

declare(strict_types=1);

namespace App\Domain\Registration\Action;

use App\Domain\Registration\Registration;

class SelectRegistrationAction implements Action
{
    public function execute(Registration $registration): void
    {
        if (Registration::STATUS_WAITING === $registration->getStatus()) {
            $registration->setStatus(Registration::STATUS_ACCEPTED);
        }
    }
}
