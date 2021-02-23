<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Event;

use App\Domain\Event\EventType;
use App\Infrastructure\Secondary\Entity\EventTypeDb;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class EventTypeDbFactory
{
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(EventTypeDb::class);
    }

    public function hydrateEventTypeDbFromEventType(EventType $eventType): EventTypeDb
    {
        /** @var EventTypeDb $eventTypeDb */
        $eventTypeDb = $this->repository->find($eventType->getId());

        return $eventTypeDb ?? (new EventTypeDb())
                ->setId($eventType->getId())
                ->setName($eventType->getName());
    }

    public function hydrateEventTypeFromEventTypeDb(EventTypeDb $eventTypeDb): EventType
    {
        return new EventType($eventTypeDb->getId(),$eventTypeDb->getName());
    }
}
