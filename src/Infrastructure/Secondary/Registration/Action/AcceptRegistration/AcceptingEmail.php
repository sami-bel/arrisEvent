<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Registration\Action\AcceptRegistration;

use App\Domain\Event\EventProvider;
use App\Domain\Registration\AcceptRegistration\AcceptRegistrationEmailData;
use App\Domain\Registration\Registration;
use Symfony\Component\Routing\RouterInterface;

class AcceptingEmail implements AcceptRegistrationEmailData
{

    public function __construct(private EventProvider $eventProvider, private RouterInterface $router)
    {
    }

    public function getParams(Registration $registration): array
    {
        $event = $this->eventProvider->getEvent($registration->getEventId());
        $url = $this->router->generate('userConfirmRegistration', ['registrationId' => $registration->getId()]);

        return [
            'eventTitle' => $event->getName(),
            'firstname' => $registration->getUser()->getFirstname(),
            'confirmationUrl' => 'http://arris.event.fr'.$url,
        ];
    }

    public function getSubject(): string
    {
        return 'Confirmation d\'inscription';
    }

    public function getTemplate(): string
    {
        return 'registration/emails/acceptRegistration.html.twig';
    }
}
