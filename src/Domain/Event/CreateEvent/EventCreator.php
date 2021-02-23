<?php

declare(strict_types=1);

namespace App\Domain\Event\CreateEvent;

use App\Domain\Event\Event;
use App\Domain\Event\EventPersister;
use App\Domain\Event\EventRequest;
use App\Domain\Event\EventTypeProvider;
use App\Domain\Uuid\IdGenerator;

class EventCreator implements ICreateEvent
{
    public function __construct(private EventTypeProvider $eventTypeProvider, private EventPersister $eventPersister, private IdGenerator $idGenerator)
    {
    }

    public function create(EventRequest $request): Event
    {
        $eventType = $this->eventTypeProvider->getEventType("688644e5-c0ef-4693-a459-93976050aa94");
        try {
            $date = new \DateTime($request->getDate());
        } catch (\Exception $e) {
            throw new \RuntimeException('');
        }
        $id = $this->idGenerator->generate();
        $event = new Event($id, $request->getName(), $date, $request->getPlaceNumber(), $eventType);
        $event = $this->eventPersister->save($event);

        return $event;
    }
}
