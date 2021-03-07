<?php

declare(strict_types=1);

namespace App\Domain\Registration\SelectRegistration;

use App\Domain\Registration\Registration;

interface ISelectRegistration
{
    public function select(SelectRegistrationRequest $request): Registration;
}
