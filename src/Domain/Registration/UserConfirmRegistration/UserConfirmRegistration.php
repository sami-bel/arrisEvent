<?php

declare(strict_types=1);

namespace App\Domain\Registration\UserConfirmRegistration;

use App\Domain\Registration\Registration;

interface UserConfirmRegistration
{
    public function confirm(UserConfirmRegistrationRequest $request): Registration;
}
