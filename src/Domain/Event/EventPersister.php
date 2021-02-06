<?php

declare(strict_types=1);

namespace App\Domain\Event;

interface EventPersister
{
    public function save(Event $event): Event;
}
