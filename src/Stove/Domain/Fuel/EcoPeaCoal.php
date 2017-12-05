<?php

namespace Stove\Domain\Fuel;

use Stove\Domain\IFuel;

class EcoPeaCoal implements IFuel
{
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
     * @param string $name
     * @param float $energyCapacity
     */
    public function __construct($name, $energyCapacity)
    {
        $this->type = EFuel::ECO_PEA_COAL();
        $this->name = $name;
        $this->energyCapacity = $energyCapacity;
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