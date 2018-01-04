<?php

namespace Stove\Domain\Stove\EcoPeaCoal;

use Payments\Domain\Events\StoveWasLit;
use Prooph\EventSourcing\AggregateChanged;
use Prooph\EventSourcing\AggregateRoot;
use Ramsey\Uuid\UuidInterface;
use Stove\Domain\Fuel\EFuel;
use Stove\Domain\IStove;
use Stove\Domain\Stove\EStoveStatus;

class Stove extends AggregateRoot implements IStove
{

    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var EFuel
     */
    private $fuelType;

    /**
     * @var EStoveStatus
     */
    private $status;

    /**
     * @var Hooper
     */
    private $hooper;
    /**
     * EcoCoalStove constructor.
     */
    public function __construct(UuidInterface $id, Hooper $hooper, EStoveStatus $status = null)
    {
        $this->id = $id;
        $this->status = $status ?: EStoveStatus::OFF();
        $this->fuelType = EFuel::ECO_PEA_COAL();
        $this->hooper = $hooper;

        parent::__construct();
    }

    public function lit(\DateTime $date = null)
    {
        $this->status = EStoveStatus::ON();
    }

    public function putOut(string $reason, \DateTime $date = null)
    {
        $this->status = EStoveStatus::OFF();
    }

    public function burn(int $amount, \DateTime $date = null)
    {
        $this->hooper->removeFuel($amount);
    }

    public function clean(\DateTime $date = null)
    {
        // TODO: Implement clean() method.
    }

    public function getFuelType(): EFuel
    {
        return $this->fuelType;
    }


    protected function aggregateId(): string
    {
        return (string)$this->id;
    }

    protected function apply(AggregateChanged $event): void
    {
        switch (get_class($event)) {
            case StoveWasLit::class:
                $this->lit($event->createdAt());

                break;

        }
    }
}