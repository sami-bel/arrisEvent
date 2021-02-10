<?php

declare(strict_types=1);

namespace App\Domain\Registration;

use App\Domain\Registration\RegisterAtAnEvent\CreateUserAndRegisterRequest;
use App\Domain\Registration\RegisterAtAnEvent\IRegisterAtAnEvent;
use App\Domain\Registration\RegisterAtAnEvent\RegisterWithExistingUserRequest;

class Handler
{
    public function __construct(private IRegisterAtAnEvent $registerAtAnEvent)
    {
    }

    public function createUserAndRegister(string $eventId, string $firstname, string $lastname, string $email, int $phoneNumber): void
    {
        $request = new CreateUserAndRegisterRequest($eventId, $firstname, $lastname, $email, $phoneNumber);
        $this->registerAtAnEvent->createUserAndRegister($request);
    }

    public function registerWithAnExistingUser(string $eventId,string $email, int $phoneNumber): void
    {
        $request = new RegisterWithExistingUserRequest($eventId, $email, $phoneNumber);
        $this->registerAtAnEvent->registerWithAnExistingUser($request);
    }
}
