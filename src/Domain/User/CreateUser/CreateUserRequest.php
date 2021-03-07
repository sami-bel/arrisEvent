<?php

declare(strict_types=1);

namespace App\Domain\User\CreateUser;

class CreateUserRequest
{
    public function __construct(private string $firstname, private string $lastname,private string $email, private string $phoneNumber)
    {
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
