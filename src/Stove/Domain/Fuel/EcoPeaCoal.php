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