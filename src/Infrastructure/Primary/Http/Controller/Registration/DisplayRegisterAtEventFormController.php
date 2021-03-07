<?php

declare(strict_types=1);

namespace App\Infrastructure\Primary\Http\Controller\Registration;

use App\Domain\Event\EventHandler;
use App\Infrastructure\Primary\Http\AbstractController;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;

class DisplayRegisterAtEventFormController extends AbstractController
{
    public function __invoke(ServerRequestInterface $request, EventHandler $eventHandler, string $eventId): Response
    {
        $event = $eventHandler->getEvent($eventId);
        return new Response(
            200,
            [],
            $this->template->render(
                'registration/registerAtEventForm.html.twig',
                [
                    'event' => $event
                ]
            )
        );
    }
}
