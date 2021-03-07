<?php

declare(strict_types=1);

namespace App\Domain\Registration\Action;

use App\Domain\Registration\Registration;

class SelectRegistrationAction implements Action
{
    public function execute(Registration $registration): void
    {
        $status = $registration->getStatus();
        if (Registration::STATUS_WAITING === $status || Registration::STATUS_REFUSED === $status) {
            $registration->setStatus(Registration::STATUS_SELECTED);
        }
    }
}
