<?php

declare(strict_types=1);

namespace App\Domain\Event;

interface EventProvider
{
    public function list(?string $sortBy = null): EventList;

    public function getEvent(string $eventId): Event;
}
