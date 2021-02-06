<?php

declare(strict_types=1);

namespace App\Domain\Event;

use App\Domain\Event\CreateEvent\ICreateEvent;

class Handler
{
    public function __construct(private ICreateEvent $eventCreator)
    {
    }

    public function create( string $name, string $date, string $typeId): Event
    {
        $request = new EventRequest($name, $date, $typeId);
        return $this->eventCreator->create($request);
    }
}
