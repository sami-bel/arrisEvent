<?php

declare(strict_types=1);

namespace App\Infrastructure\Primary\Http\Controller\Registration\Action;

use App\Domain\Registration\RegistrationHandler;
use Nyholm\Psr7\Response;
use Symfony\Component\Serializer\SerializerInterface;

class DeselectController
{
    public function __construct(private SerializerInterface $serializer)
    {
    }

    public function __invoke(string $registrationId, RegistrationHandler $handler): Response
    {
        return new Response(
            200,
            [],
            $this->serializer->serialize($handler->deselectRegistration($registrationId), 'json')
        );
    }
}
