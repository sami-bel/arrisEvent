<?php

declare(strict_types=1);

namespace App\Domain\Registration\RegisterAtAnEvent;

use App\Domain\Registration\Registration;
use App\Domain\Registration\RegistrationPersister;
use App\Domain\User\CreateUser\CreateUserRequest;
use App\Domain\User\CreateUser\ICreateUser;
use App\Domain\User\User;
use App\Domain\User\UserPersister;
use App\Domain\User\UserProvider;
use App\Domain\Uuid\IdGenerator;

class EventRegister implements IRegisterAtAnEvent
{
    public function __construct(
        private RegistrationPersister $registrationPersister,
        private ICreateUser $createUser,
        private IdGenerator $idGenerator,
        private UserProvider $userProvider
    )
    {
    }

    public function createUserAndRegister(CreateUserAndRegisterRequest $request): void
    {
        $createUSerRequest = new CreateUserRequest($request->getFirstname(), $request->getLastname(), $request->getEmail(), $request->getPhoneNumber());
        $user = $this->createUser->create($createUSerRequest);
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
