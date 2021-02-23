<?php

declare(strict_types=1);

namespace App\Domain\Event;

use App\Domain\Event\CreateEvent\ICreateEvent;
use App\Domain\Event\ListEvent\IListEvent;
use App\Domain\Event\ListEvent\ListEventRequest;

class EventHandler
{
    public function __construct(
        private ICreateEvent $eventCreator,
        private IListEvent $listReader
    )
    {
    }

    public function create( string $name, string $date, int $placeNumber, string $typeId): Event
    {
        $request = new EventRequest($name, $date, $placeNumber, $typeId);
        return $this->eventCreator->create($request);
    }

    public function listEvent(string $sortBy = null):EventList
    {
        $request = new ListEventRequest();
        return $this->listReader->list($request);
    }
}
