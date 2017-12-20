<?php

namespace Stove\Domain\Fuel;

use Stove\Domain\IFuel;

class Basket
{
    /**
     * @var EFuel
     */
    private $fuel;
    /**
     * @var integer
     */
    private $amount;

    /**
     * Basket constructor.
     *
     * @param IFuel $fuel
     * @param int $amount
     *
     * @internal param EFuel $fuelType
     */
    public function __construct(IFuel $fuel, $amount)
    {
        $this->fuel = $fuel;
        $this->amount = $amount;
    }

    /**
     * @return EFuel
     */
    public function getFuelType(): EFuel
    {
        return $this->fuel->getType();
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return EFuel
     */
    public function getFuel(): IFuel
    {
        return $this->fuel;
    }
}
