<?php

namespace Stove\Domain\Stove\EcoPeaCoal;

use Stove\Domain\Fuel\EFuel;
use Stove\Domain\IStove;
use Stove\Domain\Stove\EStoveStatus;

class Stove implements IStove
{
    /**
     * @var EFuel
     */
    private $fuelType;

    /**
     * @var EStoveStatus
     */
    private $status;

    /**
     * @var Hooper
     */
    private $hooper;
    /**
     * EcoCoalStove constructor.
     */
    public function __construct(Hooper $hooper, EStoveStatus $status = null)
    {
        $this->status = $status ?: EStoveStatus::OFF();
        $this->fuelType = EFuel::ECO_PEA_COAL();
        $this->hooper = $hooper;
    }

    public function lit(\DateTime $date = null)
    {
        $this->status = EStoveStatus::ON();
    }

    public function putOut(string $reason, \DateTime $date = null)
    {
        $this->status = EStoveStatus::OFF();
    }

    public function burn(int $amount, \DateTime $date = null)
    {
        $this->hooper->removeFuel($amount);
    }

    public function clean(\DateTime $date = null)
    {
        // TODO: Implement clean() method.
    }

    public function getFuelType(): EFuel
    {
        return $this->fuelType;
    }


}