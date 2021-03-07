<?php

declare(strict_types=1);

namespace App\Domain\Registration\Action\Factory;

use App\Domain\Registration\Action\Action;

interface ICreateAction
{
    public function create(): Action;
}
