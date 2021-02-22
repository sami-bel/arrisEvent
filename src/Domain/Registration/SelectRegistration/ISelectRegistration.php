<?php

declare(strict_types=1);

namespace App\Domain\Registration\SelectRegistration;

interface ISelectRegistration
{
    public function select(SelectRegistrationRequest $request);
}
