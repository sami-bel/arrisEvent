<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\User;

use App\Domain\User\User;
use App\Infrastructure\Secondary\Entity\UserDb;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class UserDbFactory
{
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(UserDb::class);
    }

    public function hydrateUserDbFromUser(User $user): UserDb
    {
        /** @var UserDb $userDb */
        $userDb = $this->repository->find($user->getId());

        return $userDb ??  (new UserDb())
            ->setId($user->getId())
            ->setFirstname($user->getFirstname())
            ->setLastname($user->getLastname())
            ->setEmail($user->getEmail())
            ->setPhoneNumber($user->getPhoneNumber());
    }

    public function hydrateUserFromUserDb(UserDb $userDb): User
    {
        return  new User(
            $userDb->getId(),
            $userDb->getFirstname(),
            $userDb->getLastname(),
            $userDb->getEmail(),
            $userDb->getPhoneNumber()
        );
    }
}
