<?php

declare(strict_types=1);

namespace App\Domain\Registration;

interface RegistrationPersister
{
    public function save(Registration $registration): void;
}
