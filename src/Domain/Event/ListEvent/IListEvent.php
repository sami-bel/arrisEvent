<?php

declare(strict_types=1);

namespace App\Domain\Event\ListEvent;

use App\Domain\Event\Event;
use App\Domain\Event\EventList;

Interface IListEvent
{
     public function list(ListEventRequest $request): EventList;
}
