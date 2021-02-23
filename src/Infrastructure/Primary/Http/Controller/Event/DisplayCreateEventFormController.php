<?php

declare(strict_types=1);

namespace App\Infrastructure\Primary\Http\Controller\Event;

use App\Domain\Event\EventHandler;
use App\Infrastructure\Primary\Http\AbstractController;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;

class DisplayCreateEventFormController extends AbstractController
{
    public function __invoke(ServerRequestInterface $request, EventHandler $handler): Response
    {
        return new Response(
            200,
            [],
            $this->template->render(
                'event/createEventForm.html.twig'
            )
        );
    }
}
