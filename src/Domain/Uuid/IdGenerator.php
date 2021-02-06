<?php

declare(strict_types=1);

namespace App\Domain\Uuid;

interface IdGenerator
{
    public function generate(): string;
}
