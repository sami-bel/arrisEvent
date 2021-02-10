<?php

declare(strict_types=1);

namespace App\Domain\Registration;

interface RegistrationProvider
{
    public function listRegistrationByEvent(string $eventId): RegistrationList;
}
