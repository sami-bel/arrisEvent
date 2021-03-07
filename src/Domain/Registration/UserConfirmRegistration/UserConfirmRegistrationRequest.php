<?php

declare(strict_types=1);

namespace App\Domain\Registration\UserConfirmRegistration;

class UserConfirmRegistrationRequest
{
    public function __construct(private string $registrationId)
    {
    }

    public function getRegistrationId(): string
    {
        return $this->registrationId;
    }
}
