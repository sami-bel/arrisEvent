<?php

declare(strict_types=1);

namespace App\Domain\Registration\ListRegistration;

use App\Domain\Registration\RegistrationList;
use App\Domain\Registration\RegistrationProvider;

class RegistrationReader implements IListRegistration
{
    public function __construct(private RegistrationProvider $registrationProvider)
    {
    }

    public function listByEvent(ListRegistrationByEventRequest $request): RegistrationList
    {
        return $this->registrationProvider->listRegistrationByEvent($request->getEventId());
    }

    public function listByUser(ListRegistrationByEventRequest $request): RegistrationList
    {
    }
}
