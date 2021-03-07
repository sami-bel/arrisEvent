<?php

declare(strict_types=1);

namespace App\Domain\User\CreateUser;

use App\Domain\User\User;
use App\Domain\User\UserPersister;
use App\Domain\Uuid\IdGenerator;

class CreatorUser implements ICreateUser
{
    public function __construct(private UserPersister $persister, private IdGenerator $idGenerator)
    {
    }

    public function create(CreateUserRequest $request): User
    {
        $id = $this->idGenerator->generate();
        $user = new User($id, $request->getFirstname(), $request->getLastname(), $request->getEmail(), $request->getPhoneNumber());

        return $this->persister->save($user);
    }
}
