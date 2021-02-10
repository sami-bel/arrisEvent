<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="registration")
 */
class RegistrationDb
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
    private string $eventId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Infrastructure\Secondary\Entity\UserDb")
     */
    private UserDb $user;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): RegistrationDb
    {
        $this->id = $id;
        return $this;
    }

    public function getEventId(): string
    {
        return $this->eventId;
    }

    public function setEventId(string $eventId): RegistrationDb
    {
        $this->eventId = $eventId;
        return $this;
    }

    public function getUser(): UserDb
    {
        return $this->user;
    }

    public function setUser(UserDb $user): RegistrationDb
    {
        $this->user = $user;
        return $this;
    }
}
