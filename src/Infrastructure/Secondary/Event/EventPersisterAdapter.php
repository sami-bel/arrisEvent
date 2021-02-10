<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Event;

use App\Domain\Event\Event;
use App\Domain\Event\EventPersister;
use App\Infrastructure\Secondary\Entity\EventDb;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class EventPersisterAdapter implements EventPersister
{
    public function __construct(private EventDbFactory $eventDbFactory, private EntityManagerInterface $entityManager)
    {
    }

    public function save(Event $event): Event
    {
        $eventDb = $this->eventDbFactory->hydrateEventDbFromEvent($event);
        $this->entityManager->persist($eventDb);
        $this->entityManager->flush();

        return $event;
    }
}
