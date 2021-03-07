<?php

declare(strict_types=1);

namespace App\Domain\Registration;

use App\Domain\Registration\Action\Action;
use App\Domain\User\User;

class Registration
{
    public const STATUS_WAITING = 'waiting';
    public const STATUS_SELECTED = 'selected';
    public const STATUS_ACCEPTED = 'accepted';
    public const STATUS_REFUSED = 'refused';
    public const STATUS_CONFIRMED_BY_USER = 'confirmed_by_user';

    public const REGISTERED = 'registered';

    /**
     * @var Action []
     */
    private array $actions;

    private string $status = self::STATUS_WAITING;

    public function __construct(private string $id, private User $user, private string $eventId)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
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

    public function addAction(Action $action): self
    {
        if (!in_array($action, $this->actions)) {
            $this->actions[] = $action;
        }
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): Registration
    {
        $this->status = $status;
        return $this;
    }

    public function executeAction(Action $action): void
    {
        $action->execute($this);
    }
}
