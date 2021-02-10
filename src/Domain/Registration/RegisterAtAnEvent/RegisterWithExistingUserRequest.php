<?php

declare(strict_types=1);

namespace App\Domain\Registration\RegisterAtAnEvent;

use App\Domain\User\User;

class RegisterWithExistingUserRequest
{
    public function __construct(
        private string $eventId,
        private string $email,
        private int $phoneNumber,
    )
    {
    }

    public function getEventId(): string
    {
        return $this->eventId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }
}
