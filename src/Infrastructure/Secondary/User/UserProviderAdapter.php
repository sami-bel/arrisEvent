<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\User;

use App\Domain\User\User;
use App\Domain\User\UserProvider;
use App\Infrastructure\Secondary\Entity\EventTypeDb;
use App\Infrastructure\Secondary\Entity\UserDb;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class UserProviderAdapter implements UserProvider
{
    private ObjectRepository $repository;

    public function __construct(private UserDbFactory $userDbFactory, private EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(EventTypeDb::class);
    }

    public function getByEmailAndPhoneNumber(string $email, int $phoneNumber): ?User
    {
        /** @var UserDb $userDb */
        $userDb = $this->repository->findOneBy(['email' => $email, 'phoneNumber' => $phoneNumber]);

        return null !== $userDb ? $this->userDbFactory->hydrateUserFromUserDb($userDb) : null;
    }
}
