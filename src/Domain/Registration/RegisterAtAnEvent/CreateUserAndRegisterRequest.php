<?php

declare(strict_types=1);

namespace App\Domain\Registration\RegisterAtAnEvent;

class CreateUserAndRegisterRequest
{
    public function __construct(
        private string $eventId,
        private string $firstname,
        private string $lastname,
        private string $email,
        private string $phoneNumber,
    )
    {
    }

    public function getEventId(): string
    {
        return $this->eventId;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}
