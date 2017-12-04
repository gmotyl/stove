<?php

namespace Stove\Domain;

use Stove\Domain\Fuel\EFuel;

interface IFuel
{
    public function getName(): string;
    public function getType(): EFuel;
    public function getEnergyCapacity(): float;
}