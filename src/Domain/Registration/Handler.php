<?php

declare(strict_types=1);

namespace App\Domain\Registration;

use App\Domain\Registration\AcceptRegistration\AcceptRegistrationRequest;
use App\Domain\Registration\AcceptRegistration\IAcceptRegistration;
use App\Domain\Registration\ListRegistration\IListRegistration;
use App\Domain\Registration\ListRegistration\ListRegistrationByEventRequest;
use App\Domain\Registration\RefuseRegistration\IRefuseRegistration;
use App\Domain\Registration\RefuseRegistration\RefuseRegistrationRequest;
use App\Domain\Registration\RegisterAtAnEvent\CreateUserAndRegisterRequest;
use App\Domain\Registration\RegisterAtAnEvent\IRegisterAtAnEvent;
use App\Domain\Registration\RegisterAtAnEvent\RegisterWithExistingUserRequest;
use App\Domain\Registration\SelectRegistration\ISelectRegistration;
use App\Domain\Registration\SelectRegistration\SelectRegistrationRequest;

class Handler
{
    public function __construct(
        private IRegisterAtAnEvent $registerAtAnEvent,
        private IListRegistration $listRegistration,
        private ISelectRegistration $selectRegistration,
        private IAcceptRegistration $acceptRegistration,
        private IRefuseRegistration $refuseRegistration,
    )
    {
    }

    public function createUserAndRegister(string $eventId, string $firstname, string $lastname, string $email, int $phoneNumber): void
    {
        $request = new CreateUserAndRegisterRequest($eventId, $firstname, $lastname, $email, $phoneNumber);
        $this->registerAtAnEvent->createUserAndRegister($request);
    }

    public function registerWithAnExistingUser(string $eventId,string $email, int $phoneNumber): void
    {
        $request = new RegisterWithExistingUserRequest($eventId, $email, $phoneNumber);
        $this->registerAtAnEvent->registerWithAnExistingUser($request);
    }

    public function listRegistrationByEvent(string $eventId): RegistrationList
    {
        $request = new ListRegistrationByEventRequest($eventId);
        return $this->listRegistration->listByEvent($request);
    }

    public function selectRegistration(string $registrationId): void
    {
        $request = new SelectRegistrationRequest($registrationId);
        $this->selectRegistration->select($request);
    }

    public function acceptRegistration(string $registrationId): void
    {
        $request = new AcceptRegistrationRequest($registrationId);
        $this->acceptRegistration->accept($request);
    }

    public function refuseRegistration(string $registrationId): void
    {
        $request = new RefuseRegistrationRequest($registrationId);
        $this->refuseRegistration->refuse($request);
    }
}
