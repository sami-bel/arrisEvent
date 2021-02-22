<?php

declare(strict_types=1);

namespace App\Domain\Registration\RefuseRegistration;

use App\Domain\Registration\Action\SelectRegistrationAction;
use App\Domain\Registration\RegistrationPersister;
use App\Domain\Registration\RegistrationProvider;

class RefuseRegistration implements IRefuseRegistration
{
    public function __construct(private RegistrationProvider $registrationProvider, private RegistrationPersister $registrationPersister)
    {
    }

    public function refuse(RefuseRegistrationRequest $request): void
    {
        $registration = $this->registrationProvider->getById($request->getRegistrationId());
        $action = new SelectRegistrationAction();
        $registration->executeAction($action);
        $this->registrationPersister->save($registration);
    }
}
