<?php

declare(strict_types=1);

namespace App\Domain\Registration\AcceptRegistration;

interface IAcceptRegistration
{
    public function accept(AcceptRegistrationRequest $request);
}
