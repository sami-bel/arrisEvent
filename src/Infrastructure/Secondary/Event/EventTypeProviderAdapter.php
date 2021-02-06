<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Event;

use App\Domain\Event\EventType;
use App\Domain\Event\EventTypeProvider;
use App\Infrastructure\Secondary\Entity\EventTypeDb;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class EventTypeProviderAdapter implements EventTypeProvider
{
    private ObjectRepository $repository;

    public function __construct(private EventTypeDbFactory $eventTypeDbFactory, private EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(EventTypeDb::class);
    }

    public function getEventType(string $id): ?EventType
    {
        /** @var EventTypeDb $eventTypeDb */
        $eventTypeDb = $this->repository->find($id);
        if (null == $eventTypeDb) {
            return null;
        }
        return $this->eventTypeDbFactory->hydrateEventTypeFromEventDb($eventTypeDb);
    }
}
