<?php

declare(strict_types=1);

namespace App\Infrastructure\Primary\Http\Controller\Event;

use App\Domain\Event\Handler;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Serializer\SerializerInterface;

class CreateEventController
{
    public function __construct(private SerializerInterface $serializer)
    {
    }

    public function __invoke(ServerRequestInterface $request, Handler $handler): Response
    {
        $content = json_decode($request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        return new Response(
            200,
            [],
            $this->serializer->serialize($handler->create($content['name'], $content['date'], $content['typeId']), 'json')
        );
    }
}
