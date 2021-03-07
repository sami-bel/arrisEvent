<?php

declare(strict_types=1);

namespace App\Domain\Registration\Action\Factory;

use App\Domain\Registration\AcceptRegistration\AcceptRegistrationEmailData;
use App\Domain\Registration\Action\AcceptRegistrationAction;
use App\Domain\Registration\Action\Action;
use App\Domain\Registration\Mailing\ISendEmail;

class AcceptActionFactory implements ICreateAction
{

    public function __construct(private ISendEmail $emailSender, private AcceptRegistrationEmailData $emailData)
    {
    }

    public function create(): Action
    {
        return new AcceptRegistrationAction($this->emailSender, $this->emailData);
    }
}
