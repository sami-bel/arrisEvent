<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class EventTypeDb
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


    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): EventTypeDb
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): EventTypeDb
    {
        $this->name = $name;
        return $this;
    }

    public function __toString(): string
    {
        return $this->getId();
    }
}
