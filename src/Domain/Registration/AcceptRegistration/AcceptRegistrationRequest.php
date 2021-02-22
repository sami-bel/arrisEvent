<?php

declare(strict_types=1);

namespace App\Domain\Registration\AcceptRegistration;

class AcceptRegistrationRequest
{
    public function __construct(private string $registrationId)
    {
    }

    public function getRegistrationId(): string
    {
        return $this->registrationId;
    }
}
