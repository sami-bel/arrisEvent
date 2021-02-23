<?php

declare(strict_types=1);

namespace App\Domain\Event\ListEvent;

use App\Domain\Event\Event;
use App\Domain\Event\EventList;
use App\Domain\Event\EventProvider;
use App\Domain\Registration\RegistrationProvider;

class EventReader implements IListEvent
{
    public function __construct(private EventProvider $eventProvider, private RegistrationProvider $registrationProvider)
    {
    }

    public function list(ListEventRequest $request): EventList
    {
        $eventLists =  $this->eventProvider->list($request->getSortBy());

        if (!empty($ids = $eventLists->getEventIds())) {
            $statistics = $this->registrationProvider->getRegistrationStatistics($ids);

            /**  @var Event $event*/
            foreach ($eventLists->getIterator() as $event) {
                if (array_key_exists($event->getId(), $statistics)) {
                    $event->setConfirmedNumber((int)$statistics[$event->getId()]['confirmed_by_user'])
                        ->setAcceptedNumber((int)$statistics[$event->getId()]['accepted']);
                }
            }
        }

        return $eventLists;
    }
}
