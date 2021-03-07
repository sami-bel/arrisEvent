<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Event;

use App\Domain\Event\Event;
use App\Domain\Event\EventList;
use App\Domain\Event\EventProvider;
use App\Infrastructure\Secondary\Entity\EventDb;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class EventProviderAdapter implements EventProvider
{
    /**
     * @var ObjectRepository
     */
    private ObjectRepository $repository;

    public function __construct(public EventDbFactory $eventDbFactory, private EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(EventDb::class);
    }

    public function list(?string $sortBy = null): EventList
    {
        $eventsDb = $this->repository->findAll();
        return $this->eventDbFactory->hydrateEventListFromEventDbList($eventsDb);
    }

    public function getEvent(string $eventId): Event
    {
        /** @var EventDb $eventDb */
        $eventDb = $this->repository->find($eventId);
        return $this->eventDbFactory->hydrateEventFromEventDb($eventDb);
    }
}
