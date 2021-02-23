<?php

declare(strict_types=1);

namespace App\Infrastructure\Primary\Http;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Twig\Environment;

class AbstractController
{
    public function __construct(
        public Environment $template,
        public SerializerInterface $serializer,
        public RouterInterface $router,
    )
    {
    }
}
