<?php

declare(strict_types=1);

namespace App\Domain\Event\ListEvent;

class ListEventRequest
{
    public function __construct(
        private ?string $sortBy = null,
    )
    {
    }

    public function getSortBy(): ?string
    {
        return $this->sortBy;
    }
}
