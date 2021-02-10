<?php

declare(strict_types=1);

namespace App\Domain\User\CreateUser;

use App\Domain\User\User;

interface ICreateUser
{
    public function create(CreateUserRequest $request): User;
}
