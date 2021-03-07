<?php

declare(strict_types=1);

namespace App\Domain\Registration\AcceptRegistration;

use App\Domain\Registration\Registration;

interface IAcceptRegistration
{
    public function accept(AcceptRegistrationRequest $request): Registration;
}
