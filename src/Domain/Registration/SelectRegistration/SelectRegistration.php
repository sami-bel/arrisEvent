<?php

declare(strict_types=1);

namespace App\Domain\Registration\SelectRegistration;

use App\Domain\Registration\Action\SelectRegistrationAction;
use App\Domain\Registration\RegistrationPersister;
use App\Domain\Registration\RegistrationProvider;

class SelectRegistration implements ISelectRegistration
{
    public function __construct(private RegistrationProvider $registrationProvider, private RegistrationPersister $registrationPersister)
    {
    }

    public function select(SelectRegistrationRequest $request): void
    {
        $registration = $this->registrationProvider->getById($request->getRegistrationId());
        $action = new SelectRegistrationAction();
        $registration->executeAction($action);
        $this->registrationPersister->save($registration);
    }
}
