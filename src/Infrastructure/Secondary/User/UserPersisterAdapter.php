<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\User;

use App\Domain\User\User;
use App\Domain\User\UserPersister;
use Doctrine\ORM\EntityManagerInterface;

class UserPersisterAdapter implements UserPersister
{

    public function __construct(private UserDbFactory $userDbFactory, private EntityManagerInterface $entityManager)
    {
    }

    public function save(User $user): User
    {
        $userDb = $this->userDbFactory->hydrateUserDbFromUser($user);
        $this->entityManager->persist($userDb);
        $this->entityManager->flush();

        return $user;
    }
}
