<?php

declare(strict_types=1);

namespace App\Domain\User\CreateUser;

class CreateUserRequest
{
    public function __construct(private string $email, private int $phoneNumber)
    {
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
