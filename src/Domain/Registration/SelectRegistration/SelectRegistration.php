<?php

declare(strict_types=1);

namespace App\Domain\Registration\SelectRegistration;

use App\Domain\Registration\Action\Factory\SelectActionFactory;
use App\Domain\Registration\Registration;
use App\Domain\Registration\RegistrationPersister;
use App\Domain\Registration\RegistrationProvider;

class SelectRegistration implements ISelectRegistration
{
    public function __construct(private RegistrationProvider $registrationProvider, private RegistrationPersister $registrationPersister, private SelectActionFactory $createAction)
    {
    }

    public function select(SelectRegistrationRequest $request): Registration
    {
        $registration = $this->registrationProvider->getById($request->getRegistrationId());
        $action = $this->createAction->create();
        $registration->executeAction($action);
        $this->registrationPersister->save($registration);

        return $registration;
    }
}
