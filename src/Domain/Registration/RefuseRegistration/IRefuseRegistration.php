<?php

declare(strict_types=1);

namespace App\Domain\Registration\RefuseRegistration;

interface IRefuseRegistration
{
    public function refuse(RefuseRegistrationRequest $request);
}
