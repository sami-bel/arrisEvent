<?php

declare(strict_types=1);

namespace App\Domain\Event;

class EventList implements \IteratorAggregate, \Countable
{
    private array $eventsList = [];
    public function __construct(
        array $events
    )
    {
        foreach ($events as $event)
        {
            $this->addEvent($event);
        }
    }

    public function addEvent(Event $event): self
    {
        if (!in_array($event, $this->eventsList)) {
            $this->eventsList[] = $event;
        }

        return $this;
    }

    public function getIterator()
    {
        return  new \ArrayIterator($this->eventsList);
    }

    public function count()
    {
        return count($this->eventsList);
    }

    public function getEventIds(): ?array
    {
        foreach ($this->eventsList as $event)
        {
            $ids[] = $event->getId();
        }

        return $ids ?? [];
    }
}
