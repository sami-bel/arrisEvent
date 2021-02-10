<?php

declare(strict_types=1);

namespace App\Domain\Registration\RegisterAtAnEvent;

use App\Domain\Registration\Registration;
use App\Domain\Registration\RegistrationPersister;
use App\Domain\User\User;
use App\Domain\User\UserPersister;
use App\Domain\User\UserProvider;
use App\Domain\Uuid\IdGenerator;

class EventRegister implements IRegisterAtAnEvent
{
    public function __construct(
        private RegistrationPersister $registrationPersister,
        private  UserPersister $userPersister,
        private IdGenerator $idGenerator,
        private UserProvider $userProvider
    )
    {
    }

    public function createUserAndRegister(CreateUserAndRegisterRequest $request): void
    {
        $id = $this->idGenerator->generate();
        $user = new User($id, $request->getFirstname(), $request->getLastname(), $request->getEmail(), $request->getPhoneNumber());
        $this->userPersister->save($user);

        $this->register($user, $request->getEventId());
    }

    public function registerWithAnExistingUser(RegisterWithExistingUserRequest $request): void
    {
        $user = $this->userProvider->getByEmailAndPhoneNumber($request->getEmail(), $request->getPhoneNumber());

        if (null === $user) {
            throw new \RuntimeException('');
        }
        $this->register($user, $request->getEventId());
    }

    private function register(User $user, string $eventId): void
    {
        $id = $this->idGenerator->generate();
        $registration = new Registration($id, $user, $eventId);
        $this->registrationPersister->save($registration);
    }
}
