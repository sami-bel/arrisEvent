<?php

declare(strict_types=1);

namespace App\Domain\Registration;

class RegistrationList implements \IteratorAggregate, \Countable
{
    /**
     * @var Registration []
     */
    private array $registrations;

    public function __construct(array $registrations)
    {
        $this->registrations = $registrations;
    }

    public function addRegistration(Registration $registration): void
    {
        if (!in_array($registration, $this->registrations))
        {
            $this->registrations[] = $registration;
        }

    }
    public function getIterator(): \Traversable
    {
        return  new \ArrayIterator($this->registrations);
    }

    public function count(): int
    {
        return count($this->registrations);
    }

    public function getRegistrations(): array
    {
        return $this->registrations;
    }
}
