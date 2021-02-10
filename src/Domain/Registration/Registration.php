<?php

declare(strict_types=1);

namespace App\Domain\Registration;

use App\Domain\User\User;

class Registration
{
    public function __construct( private string $id, private User $user, private string $eventId)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Registration
    {
        $this->id = $id;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): Registration
    {
        $this->user = $user;
        return $this;
    }

    public function getEventId(): string
    {
        return $this->eventId;
    }

    public function setEventId(string $eventId): Registration
    {
        $this->eventId = $eventId;
        return $this;
    }
}
