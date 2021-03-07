<?php

declare(strict_types=1);

namespace App\Domain\Registration\Mailing;

use App\Domain\Registration\Registration;

interface EmailData
{
    public function getParams(Registration $registration): array;

    public function getSubject(): string;

    public function getTemplate(): string;
}
