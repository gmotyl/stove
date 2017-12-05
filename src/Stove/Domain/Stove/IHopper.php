<?php

namespace Stove\Domain\Stove;

use Stove\Domain\Fuel\EFuel;

interface IHopper
{
    public function addFuel(EFuel $type, int $amount);
    public function removeFuel(int $amount);
    public function getFuelType(): EFuel;
    public function getAmount(): int;
}
