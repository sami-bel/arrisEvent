<?php

declare(strict_types=1);

namespace App\Infrastructure\Primary\Http\Controller\Registration\Action;

use App\Domain\Registration\RegistrationHandler;
use App\Infrastructure\Primary\Http\AbstractController;
use Nyholm\Psr7\Response;
use Symfony\Component\Serializer\SerializerInterface;

class UserConfirmController extends AbstractController
{
    public function __invoke(string $registrationId, RegistrationHandler $handler): Response
    {
        $handler->userConfirmRegistration($registrationId);
        return new Response(
            200,
            [],
            $this->template->render(
                'registration/confirmSuccessRegistration.html.twig',
            )
        );
    }
}
