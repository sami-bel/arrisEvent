<?php

declare(strict_types=1);

namespace App\Domain\Registration\AcceptRegistration;

use App\Domain\Registration\Action\AcceptRegistrationAction;
use App\Domain\Registration\RegistrationPersister;
use App\Domain\Registration\RegistrationProvider;

class AcceptRegistration implements IAcceptRegistration
{
    public function __construct(private RegistrationProvider $registrationProvider, private RegistrationPersister $registrationPersister)
    {
    }

    public function accept(AcceptRegistrationRequest $request): void
    {
        $registration = $this->registrationProvider->getById($request->getRegistrationId());
        $action = new AcceptRegistrationAction();
        $registration->executeAction($action);
        $this->registrationPersister->save($registration);
    }
}
