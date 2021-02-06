<?php

declare(strict_types=1);

namespace App\Domain\Event\CreateEvent;

use App\Domain\Event\Event;
use App\Domain\Event\EventRequest;

Interface ICreateEvent
{
     public function create(EventRequest $request): Event;
}
