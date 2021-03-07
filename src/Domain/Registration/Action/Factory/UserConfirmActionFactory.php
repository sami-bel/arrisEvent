<?php

declare(strict_types=1);

namespace App\Domain\Registration\Action\Factory;

use App\Domain\Registration\Action\Action;
use App\Domain\Registration\Action\UserConfirmRegistrationAction;

class UserConfirmActionFactory implements ICreateAction
{

    public function create(): Action
    {
        return new UserConfirmRegistrationAction();
    }
}
