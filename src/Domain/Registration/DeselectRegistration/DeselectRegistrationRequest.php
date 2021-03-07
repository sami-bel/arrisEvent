<?php

declare(strict_types=1);

namespace App\Domain\Registration\DeselectRegistration;

class DeselectRegistrationRequest
{
    public function __construct(private string $registrationId)
    {
    }

    public function getRegistrationId(): string
    {
        return $this->registrationId;
    }
}
