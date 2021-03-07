<?php

declare(strict_types=1);

namespace App\Infrastructure\Primary\Http\Controller\Registration;

use App\Domain\Registration\RegistrationHandler;
use App\Infrastructure\Primary\Http\AbstractController;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;

class listRegistrationByEventController extends AbstractController
{
    public function __invoke(string $eventId, ServerRequestInterface $request, RegistrationHandler $handler): Response
    {
        return new Response(
            200,
            [],
            $this->template->render(
                'registration/listRegistration.html.twig',
                [
                    'registrations' => $handler->listRegistrationByEvent($eventId)->getRegistrations()
                ]
            )
        );
    }
}
