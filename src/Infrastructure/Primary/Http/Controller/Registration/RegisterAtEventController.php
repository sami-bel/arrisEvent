<?php

declare(strict_types=1);

namespace App\Infrastructure\Primary\Http\Controller\Registration;

use App\Domain\Registration\Handler;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Serializer\SerializerInterface;

class RegisterAtEventController
{
    public function __construct(private SerializerInterface $serializer)
    {
    }

    public function __invoke(string $eventId, ServerRequestInterface $request, Handler $handler): Response
    {
        $content = json_decode($request->getBody()->getContents(), true);
        $handler->createUserAndRegister($eventId, $content['firstname'], $content['lastname'], $content['email'], (int)$content['phoneNumber']);
        return new Response(
            200,
            [],
            'registration ok'
        );
    }
}
