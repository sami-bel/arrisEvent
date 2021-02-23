<?php

declare(strict_types=1);

namespace App\Infrastructure\Primary\Http\Controller\Event;

use App\Domain\Event\EventHandler;
use App\Infrastructure\Primary\Http\AbstractController;
use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CreateEventController extends AbstractController
{
     public function __invoke(ServerRequestInterface $request, EventHandler $handler): ResponseInterface
    {
        $content = $request->getParsedBody();
        $handler->create($content['event-name'], $content['event-date'], (int)$content['event-place-number'], $content['event-type']);
        return new RedirectResponse($this->router->generate('listEvent'));
    }
}
