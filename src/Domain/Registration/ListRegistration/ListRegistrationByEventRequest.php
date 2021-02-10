<?php

declare(strict_types=1);

namespace App\Domain\Registration\ListRegistration;

class ListRegistrationByEventRequest
{
    public function __construct(private string $eventId)
    {
    }

    public function getEventId(): string
    {
        return $this->eventId;
    }
}
