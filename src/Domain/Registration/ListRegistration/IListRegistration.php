<?php

declare(strict_types=1);

namespace App\Domain\Registration\ListRegistration;

use App\Domain\Registration\RegistrationList;

interface IListRegistration
{
    public function listByEvent(ListRegistrationByEventRequest $request): RegistrationList;
    public function listByUser(ListRegistrationByEventRequest $request): RegistrationList;
}
