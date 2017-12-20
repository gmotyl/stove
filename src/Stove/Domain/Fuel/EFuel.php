<?php

namespace Stove\Domain\Fuel;

use Esky\Enum\Enum;

class EFuel extends Enum
{
    public const COAL = 1;
    public const ECO_PEA_COAL = 2;
    public const WOOD = 3;
    public const GAS = 4;
    public const PETROL = 5;
}