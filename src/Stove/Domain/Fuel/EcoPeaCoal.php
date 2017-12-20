<?php

namespace Stove\Domain\Fuel;

use Ramsey\Uuid\UuidInterface;
use Stove\Domain\IFuel;

class EcoPeaCoal implements IFuel
{

    /**
     * @var UuidInterface
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var EFuel
     */
    private $type;
    /**
     * @var float;
     */
    private $energyCapacity;

    /**
     * EcoPeaCoal constructor.
     *
     * @param UuidInterface $id
     * @param string $name
     * @param float $energyCapacity
     */
    public function __construct(UuidInterface $id, $name, $energyCapacity)
    {
        $this->id = $id;
        $this->type = EFuel::ECO_PEA_COAL();
        $this->name = $name;
        $this->energyCapacity = $energyCapacity;
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return EFuel
     */
    public function getType(): EFuel
    {
        return $this->type;
    }

    /**
     * @return float
     */
    public function getEnergyCapacity(): float
    {
        return $this->energyCapacity;
    }
}
