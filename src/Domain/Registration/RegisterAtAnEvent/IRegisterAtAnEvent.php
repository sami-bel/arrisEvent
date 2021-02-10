<?php

declare(strict_types=1);

namespace App\Domain\Registration\RegisterAtAnEvent;


interface IRegisterAtAnEvent
{
    public function createUserAndRegister(CreateUserAndRegisterRequest $request): void;

    public function registerWithAnExistingUser(RegisterWithExistingUserRequest $request): void;
}
