<?php

declare(strict_types=1);

namespace App\Domain\Event\GetEvent;

use App\Domain\Event\Event;

interface IGetEvent
{
    public function getEvent(GetEventRequest $request): Event;
}
