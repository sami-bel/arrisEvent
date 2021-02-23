<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Entity;

use App\Domain\Event\Event;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="event")
 */
class EventDb
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @Assert\Uuid()
     */
    private string $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="date")
     */
    private \DateTime $date;

    /**
     * @ORM\Column(type="integer")
     */
    private int $placeNumber = 0;

    /**
     * @ORM\Column(type="string")
     */
    private string $status = Event::STATUS_OPEN;
    /**
     * @ORM\ManyToOne(targetEntity="App\Infrastructure\Secondary\Entity\EventTypeDb")
     */
    private EventTypeDb $type;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): EventDb
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): EventDb
    {
        $this->name = $name;
        return $this;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): EventDb
    {
        $this->date = $date;
        return $this;
    }

    public function getPlaceNumber(): int
    {
        return $this->placeNumber;
    }

    public function setPlaceNumber(int $placeNumber): EventDb
    {
        $this->placeNumber = $placeNumber;
        return $this;
    }

    public function getType(): EventTypeDb
    {
        return $this->type;
    }

    public function setType(EventTypeDb $type): EventDb
    {
        $this->type = $type;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): EventDb
    {
        $this->status = $status;
        return $this;
    }
}
