<?php

declare(strict_types=1);

namespace App\Domain\Registration\RefuseRegistration;

use App\Domain\Registration\Registration;

interface IRefuseRegistration
{
    public function refuse(RefuseRegistrationRequest $request): Registration;
}
