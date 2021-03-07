<?php

declare(strict_types=1);

namespace App\Domain\Event\GetEvent;

class GetEventRequest
{
    public function __construct(public string $eventId)
    {
    }

    public function getEventId(): string
    {
        return $this->eventId;
    }
}
