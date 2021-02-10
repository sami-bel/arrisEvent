<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="user")
 */
class UserDb
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
    private string $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $lastname
    ;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $email;

    /**
     * @ORM\Column(type="integer")
     */
    private int $phoneNumber;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): UserDb
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return UserDb
     */
    public function setFirstname(string $firstname): UserDb
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): UserDb
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): UserDb
    {
        $this->email = $email;
        return $this;
    }

    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(int $phoneNumber): UserDb
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }
}
