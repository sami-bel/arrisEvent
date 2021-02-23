<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Event;

use App\Domain\Event\Event;
use App\Domain\Event\EventList;
use App\Domain\Event\EventTypeProvider;
use App\Infrastructure\Secondary\Entity\EventDb;

class EventDbFactory
{
    public function __construct(private EventTypeDbFactory $eventTypeDbFactory)
    {
    }

    public function hydrateEventDbFromEvent(Event $event): EventDb
    {
        $eventTypeDb = $this->eventTypeDbFactory->hydrateEventTypeDbFromEventType($event->getType());
        return  (new EventDb())
            ->setId($event->getId())
            ->setName($event->getName())
            ->setDate($event->getDate())
            ->setPlaceNumber($event->getPlaceNumber())
            ->setType($eventTypeDb);
    }

    public function hydrateEventFromEventDb(EventDb $eventDb): Event
    {
        $eventType = $this->eventTypeDbFactory->hydrateEventTypeFromEventTypeDb($eventDb->getType());

        return  new Event(
            $eventDb->getId(),
            $eventDb->getName(),
            $eventDb->getDate(),
            $eventDb->getPlaceNumber(),
            $eventType,
        );
    }

    public function hydrateEventListFromEventDbList(array $eventsDb): EventList
    {
        $eventList = [];
        foreach ($eventsDb as $eventDb) {
            $eventList[] = $this->hydrateEventFromEventDb($eventDb);
        }
        return  new EventList($eventList);
    }
}
