<?php

namespace App\Controller;


use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class DefaultController
{

    public function index(): ResponseInterface
    {
        return new Response(
            200,
            [],
            'OK');
    }
}
