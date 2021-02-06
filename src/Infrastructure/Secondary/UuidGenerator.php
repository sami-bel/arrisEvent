<?php

declare(strict_types=1);

namespace App\Infrastructure\Secondary;

use App\Domain\Uuid\IdGenerator;

class UuidGenerator implements IdGenerator
{
    public function generate(): string
    {
        $uuid = uuid_create();
        if (null === $uuid) {
            throw new \RuntimeException('Cannot generate new uuid.');
        }

        return $uuid;
    }
}
