<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserPersister
{
    public function save(User $user): User;
}
