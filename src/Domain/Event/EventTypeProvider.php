<?php

declare(strict_types=1);

namespace App\Domain\Event;

interface EventTypeProvider
{
    public function getEventType(string $id): ?EventType;
}
