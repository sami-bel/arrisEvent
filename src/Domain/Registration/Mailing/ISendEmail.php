<?php

declare(strict_types=1);

namespace App\Domain\Registration\Mailing;

use App\Domain\Registration\Registration;

interface ISendEmail
{
    public function send(Registration $registration, EmailData $email): void;
}
