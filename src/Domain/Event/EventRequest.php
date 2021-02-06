<?php

declare(strict_types=1);

namespace App\Domain\Event;

class EventRequest
{
    public function __construct(

        private string $name,
        private string $date,
        private string $typeId,
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getTypeId(): string
    {
        return $this->typeId;
    }
}
