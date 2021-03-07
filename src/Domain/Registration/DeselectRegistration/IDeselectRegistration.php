<?php

declare(strict_types=1);

namespace App\Domain\Registration\DeselectRegistration;

use App\Domain\Registration\Registration;

interface IDeselectRegistration
{
    public function deselect(DeselectRegistrationRequest $request): Registration;
}
