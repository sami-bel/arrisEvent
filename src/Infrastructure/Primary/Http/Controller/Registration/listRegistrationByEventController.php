<?php

declare(strict_types=1);

namespace App\Infrastructure\Primary\Http\Controller\Registration;

use App\Domain\Registration\Handler;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Serializer\SerializerInterface;

class listRegistrationByEventController
{
    public function __construct(private SerializerInterface $serializer)
    {
    }

    public function __invoke(string $eventId, ServerRequestInterface $request, Handler $handler): Response
    {
        $handler->listRegistrationByEvent($eventId)->getRegistrations();
        return new Response(
            200,
            [],
            $this->serializer->serialize($handler->listRegistrationByEvent($eventId)->getRegistrations(), 'json'));
    }
}
