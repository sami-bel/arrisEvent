<?php

declare(strict_types=1);

namespace App\Domain\Registration\RefuseRegistration;

use App\Domain\Registration\Action\Factory\RefuseActionFactory;
use App\Domain\Registration\Registration;
use App\Domain\Registration\RegistrationPersister;
use App\Domain\Registration\RegistrationProvider;

class RefuseRegistration implements IRefuseRegistration
{
    public function __construct(private RegistrationProvider $registrationProvider, private RegistrationPersister $registrationPersister, private RefuseActionFactory $createAction)
    {
    }

    public function refuse(RefuseRegistrationRequest $request): Registration
    {
        $registration = $this->registrationProvider->getById($request->getRegistrationId());
        $action = $this->createAction->create();
        $registration->executeAction($action);
        $this->registrationPersister->save($registration);

        return $registration;
    }
}
