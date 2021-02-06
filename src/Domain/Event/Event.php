<?php

declare(strict_types=1);

namespace App\Domain\Event;

class Event
{
    public function __construct(
        private string $id,
        private string $name,
        private \DateTime $date,
        private EventType $type
    )
    {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getType(): EventType
    {
        return $this->type;
    }
}
