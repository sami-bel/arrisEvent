<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserProvider
{
    public function getByEmailAndPhoneNumber(string $email, int $phoneNumber): ?User;
}
