<?php

declare(strict_types=1);

namespace App\Domain\Registration\UserConfirmRegistration;

use App\Domain\Registration\Action\Factory\UserConfirmActionFactory;
use App\Domain\Registration\Registration;
use App\Domain\Registration\RegistrationPersister;
use App\Domain\Registration\RegistrationProvider;

class ConfirmRegistration implements UserConfirmRegistration
{
    public function __construct(private RegistrationProvider $registrationProvider, private RegistrationPersister $registrationPersister, private UserConfirmActionFactory $createAction)
    {
    }

    public function confirm(UserConfirmRegistrationRequest $request): Registration
    {
        $registration = $this->registrationProvider->getById($request->getRegistrationId());
        $action = $this->createAction->create();
        $registration->executeAction($action);
        $this->registrationPersister->save($registration);

        return $registration;
    }
}
