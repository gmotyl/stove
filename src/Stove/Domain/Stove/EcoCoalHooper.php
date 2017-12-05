<?php

namespace Stove\Domain\Stove;

use Stove\Domain\Fuel\Exception\IncorrectFuelTypeException;
use Stove\Domain\Stove\Exception\IncorrectAmountExeption;
use Stove\Domain\Fuel\Basket;
use Stove\Domain\Fuel\EFuel;

class EcoCoalHooper implements IHopper
{
    /**
     * @var integer
     */
    private $capacity;

    /**
     * @var integer
     */
    private $amount;

    /**
     * @var EFuel
     */
    private $fuelType;

    /**
     * EcoCoalStoveHooper constructor.
     *
     * @param int $capacity
     * @param int $amount
     */
    public function __construct($amount = 0, $capacity = null)
    {
        $this->capacity = $capacity;
        $this->amount = $amount;
        $this->fuelType = EFuel::ECO_PEA_COAL();
    }

    /**
     * @return EFuel
     */
    public function getFuelType(): EFuel
    {
        return $this->fuelType;
    }

    /**
     * @param EFuel $type
     * @param int $amount
     *
     * @throws IncorrectFuelTypeException
     */
    public function addFuel(EFuel $type, int $amount)
    {
        if ($this->fuelType->getValue() !== $type->getValue()) {
            throw new IncorrectFuelTypeException('Cant add fuel of type: ' . $type->getName());
        }

        $this->amount += $amount;
        ($this->capacity < $this->amount) && $this->capacity = $this->amount;
    }

    /**
     * @param int $amount
     *
     * @throws IncorrectAmountExeption
     */
    public function removeFuel(int $amount)
    {
        if ($amount > $this->amount) {
            throw new IncorrectAmountExeption('Cant remove more fuel than available in hooper');
        }

        $this->amount -= $amount;
    }

    /**
     * @param Basket $basket
     * @param int $count
     */
    public function addBaskets(Basket $basket, int $count)
    {
        for ($i=0; $i < $count; $i++){
            $this->addFuel($basket->getFuelType(), $basket->getAmount());
        }
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }
}
