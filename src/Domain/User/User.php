<?php

declare(strict_types=1);

namespace App\Domain\User;

class User
{
    public function __construct(
        private string $id,
        private string $firstname,
        private string $lastname,
        private string $email,
        private string $phoneNumber
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): User
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): User
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
