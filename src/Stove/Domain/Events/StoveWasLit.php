<?php

namespace Payments\Domain\Events;

use Prooph\EventSourcing\AggregateChanged;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class StoveWasLit extends AggregateChanged
{
    public static function create(
        UuidInterface $id,
        string $reason
    ) {
        return static::occur(
            (string)$id,
            [
                'reason' => $reason,
            ]
        );
    }

    public function id()
    {
        return Uuid::fromString($this->aggregateId());
    }

    public function reason()
    {
        return $this->payload['reason'];
    }
}