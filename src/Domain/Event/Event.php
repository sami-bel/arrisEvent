<?php

declare(strict_types=1);

namespace App\Domain\Event;

class Event
{
    public const STATUS_OPEN = 'open';

    public const STATUS_CLOSED = 'closed';

    private string $status = self::STATUS_OPEN;

    private int $registeredNumber = 0;

    private int $acceptedNumber = 0;

    private int $confirmedNumber = 0;

    public function __construct(
        private string $id,
        private string $name,
        private \DateTime $date,
        private int $placeNumber,
        private EventType $type
    )
    {
    }

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

    public function getPlaceNumber(): int
    {
        return $this->placeNumber;
    }

    public function getType(): EventType
    {
        return $this->type;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): Event
    {
        $this->status = $status;
        return $this;
    }

    public function getRegisteredNumber(): int
    {
        return $this->registeredNumber;
    }

    public function setRegisteredNumber(int $registeredNumber): Event
    {
        $this->registeredNumber = $registeredNumber;
        return $this;
    }

    public function getAcceptedNumber(): int
    {
        return $this->acceptedNumber;
    }

    public function setAcceptedNumber(int $acceptedNumber): Event
    {
        $this->acceptedNumber = $acceptedNumber;
        return $this;
    }

    public function getConfirmedNumber(): int
    {
        return $this->confirmedNumber;
    }

    public function setConfirmedNumber(int $confirmedNumber): Event
    {
        $this->confirmedNumber = $confirmedNumber;
        return $this;
    }
}
