<?php

declare(strict_types=1);

namespace App\Domain\Registration;

interface RegistrationProvider
{
    public function getById(string $registrationId): Registration;

    public function listRegistrationByEvent(string $eventId): RegistrationList;

    public function getRegistrationStatistics(array $eventsId = []): array;
}
