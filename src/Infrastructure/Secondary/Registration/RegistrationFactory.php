<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Registration;

use App\Domain\Registration\Registration;
use App\Domain\Registration\RegistrationList;
use App\Infrastructure\Secondary\Entity\EventTypeDb;
use App\Infrastructure\Secondary\Entity\RegistrationDb;
use App\Infrastructure\Secondary\User\UserDbFactory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class RegistrationFactory
{
    private ObjectRepository $repository;

    public function __construct(private UserDbFactory $userDbFactory, EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(RegistrationDb::class);
    }

    public function hydrateRegistrationDbFromRegistration(Registration $registration): RegistrationDb
    {
        $user = $this->userDbFactory->hydrateUserDbFromUser($registration->getUser());
        /** @var RegistrationDb $registratio */
        $registrationDb = $this->repository->find($registration->getId()) ?: new RegistrationDb();

        return  $registrationDb
            ->setId($registration->getId())
            ->setUser($user)
            ->setStatus($registration->getStatus())
            ->setEventId($registration->getEventId());
    }

    public function hydrateRegistrationFromRegistrationDb(RegistrationDb $registrationDb): Registration
    {
        $user = $this->userDbFactory->hydrateUserFromUserDb($registrationDb->getUser());
        $registration = new Registration(
            $registrationDb->getId(),
            $user,
            $registrationDb->getEventId()
        );

        $registration->setStatus($registrationDb->getStatus());

        return $registration;
    }

    public function hydrateRegistrationListFromRegistrationDbList(array $registrationDbList): RegistrationList
    {
        $registrationList = [];
        foreach ($registrationDbList as $registrationDb) {
            $registrationList[] = $this->hydrateRegistrationFromRegistrationDb($registrationDb);
        }

        return new RegistrationList($registrationList);
    }
}
