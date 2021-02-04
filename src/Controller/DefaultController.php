<?php

namespace App\Controller;


class DefaultController
{

    public function index(): ResponseInterface
    {
        return new Response(
            200,
            [],
            $this->template->render('home.html.twig'));
    }
}
