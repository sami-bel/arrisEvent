<?php

declare(strict_types=1);

namespace App\Domain\Registration\DeselectRegistration;

use App\Domain\Registration\Action\Factory\DeselectActionFactory;
use App\Domain\Registration\Registration;
use App\Domain\Registration\RegistrationPersister;
use App\Domain\Registration\RegistrationProvider;

class DeselectRegistration implements IDeselectRegistration
{
    public function __construct(private RegistrationProvider $registrationProvider, private RegistrationPersister $registrationPersister, private DeselectActionFactory $createAction)
    {
    }

    public function deselect(DeselectRegistrationRequest $request): Registration
    {
        $registration = $this->registrationProvider->getById($request->getRegistrationId());
        $action = $this->createAction->create();
        $registration->executeAction($action);
        $this->registrationPersister->save($registration);

        return $registration;
    }
}
