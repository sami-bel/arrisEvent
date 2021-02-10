<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Registration;

use App\Domain\Registration\Registration;
use App\Infrastructure\Secondary\Entity\RegistrationDb;
use App\Infrastructure\Secondary\User\UserDbFactory;

class RegistrationFactory
{
    public function __construct(private UserDbFactory $userDbFactory)
    {
    }

    public function hydrateRegistrationDbFromRegistration(Registration $registration): RegistrationDb
    {
        $user = $this->userDbFactory->hydrateUserDbFromUser($registration->getUser());

        return  (new RegistrationDb())
            ->setId($registration->getId())
            ->setUser($user)
            ->setEventId($registration->getEventId());
    }

    public function hydrateRegistrationFromRegistrationDb(RegistrationDb $registration): Registration
    {
        $user = $this->userDbFactory->hydrateUserFromUserDb($registration->getUser());
        return  new Registration(
            $registration->getId(),
            $user,
            $registration->getEventId()
        );
    }
}
