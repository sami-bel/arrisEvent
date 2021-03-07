<?php

declare(strict_types=1);

namespace App\Infrastructure\Primary\Http\Controller\Registration;

use App\Domain\Registration\RegistrationHandler;
use App\Infrastructure\Primary\Http\AbstractController;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;

class RegisterAtEventController extends AbstractController
{
    public function __invoke(string $eventId, ServerRequestInterface $request, RegistrationHandler $handler): Response
    {
        $content = $request->getParsedBody();
        $handler->createUserAndRegister($eventId, $content['registration-firstName'], $content['registration-lastName'], $content['registration-email'], $content['registration-phone-number']);
        return new Response(
            200,
            [],
            $this->template->render(
                'registration/registrationSuccessRegistration.html.twig',
            )
        );
    }
}
