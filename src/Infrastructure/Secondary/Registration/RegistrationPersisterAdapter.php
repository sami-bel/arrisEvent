<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Registration;

use App\Domain\Registration\Registration;
use App\Domain\Registration\RegistrationPersister;
use App\Infrastructure\Secondary\Event\EventDbFactory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class RegistrationPersisterAdapter implements RegistrationPersister
{
    private ObjectRepository $repository;

    public function __construct(private RegistrationFactory $registrationFactory, private EntityManagerInterface $entityManager)
    {
    }
    public function save(Registration $registration): void
    {
        $registrationDb = $this->registrationFactory->hydrateRegistrationDbFromRegistration($registration);
        $this->entityManager->persist($registrationDb);
        $this->entityManager->flush();
    }
}
