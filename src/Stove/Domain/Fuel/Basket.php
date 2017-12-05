<?php

namespace Stove\Domain\Fuel;

class Basket
{
    /**
     * @var EFuel
     */
    private $fuelType;
    /**
     * @var integer
     */
    private $amount;

    /**
     * Basket constructor.
     *
     * @param EFuel $fuelType
     * @param int $amount
     */
    public function __construct(EFuel $fuelType, $amount)
    {
        $this->fuelType = $fuelType;
        $this->amount = $amount;
    }

    /**
     * @return EFuel
     */
    public function getFuelType(): EFuel
    {
        return $this->fuelType;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

}
