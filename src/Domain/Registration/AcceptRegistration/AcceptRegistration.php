<?php

declare(strict_types=1);

namespace App\Domain\Registration\AcceptRegistration;

use App\Domain\Registration\Action\Factory\AcceptActionFactory;
use App\Domain\Registration\Registration;
use App\Domain\Registration\RegistrationPersister;
use App\Domain\Registration\RegistrationProvider;

class AcceptRegistration implements IAcceptRegistration
{
    public function __construct(private RegistrationProvider $registrationProvider, private RegistrationPersister $registrationPersister, private AcceptActionFactory $createAction)
    {
    }

    public function accept(AcceptRegistrationRequest $request): Registration
    {
        $registration = $this->registrationProvider->getById($request->getRegistrationId());
        $action = $this->createAction->create();
        $registration->executeAction($action);
        $this->registrationPersister->save($registration);

        return $registration;
    }
}
