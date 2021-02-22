<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Registration;

use App\Domain\Registration\Registration;
use App\Domain\Registration\RegistrationList;
use App\Domain\Registration\RegistrationNotFoundException;
use App\Domain\Registration\RegistrationProvider;
use App\Infrastructure\Secondary\Entity\RegistrationDb;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class RegistrationProviderAdapter implements RegistrationProvider
{
    private ObjectRepository $repository;

    public function __construct(private RegistrationFactory $registrationFactory, private EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(RegistrationDb::class);
    }

    public function getById(string $registrationId): Registration
    {
        /**@var RegistrationDb $registrationDb */
        $registrationDb = $this->repository->find($registrationId);

        if (null === $registrationDb) {
            throw new RegistrationNotFoundException(sprintf('Aucune inscritption n\'est liée à l\'id : %s', $registrationId));
        }

        return $this->registrationFactory->hydrateRegistrationFromRegistrationDb($registrationDb);
    }

    public function listRegistrationByEvent(string $eventId): RegistrationList
    {
        $list = $this->repository->findBy(['eventId' => $eventId]);
        return $this->registrationFactory->hydrateRegistrationListFromRegistrationDbList($list);
    }
}
