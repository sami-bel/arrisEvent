<?php

declare(strict_types=1);

namespace App\Domain\Registration\Action;

use App\Domain\Registration\Registration;
use App\Domain\Registration\RegistrationPersister;

interface Action
{
    public function execute(Registration $registration): void;
}
