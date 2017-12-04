<?php

namespace Stove\Domain\Fuel;

use Esky\Enum\Enum;

class EFuel extends Enum
{
    const COAL = 1;
    const ECO_PEA_COAL = 2;
    const WOOD = 3;
    const GAS = 4;
    const PETROL = 5;
}