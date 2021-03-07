<?php

declare(strict_types=1);

namespace App\Domain\Event\GetEvent;

use App\Domain\Event\Event;
use App\Domain\Event\EventProvider;

class EventGetter implements IGetEvent
{

    public function __construct(public EventProvider $eventProvider)
    {
    }

    public function getEvent(GetEventRequest $request): Event
    {
        return $this->eventProvider->getEvent($request->getEventId());
    }
}
