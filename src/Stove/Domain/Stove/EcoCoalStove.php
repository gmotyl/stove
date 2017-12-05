<?php

namespace Stove\Domain\Stove;

use Stove\Domain\Fuel\EFuel;
use Stove\Domain\IStove;

class EcoCoalStove implements IStove
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
     * @var EcoCoalHooper
     */
    private $hooper;
    /**
     * EcoCoalStove constructor.
     */
    public function __construct(EcoCoalHooper $hooper, EStoveStatus $status = null)
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

    public function burn(\DateTime $date = null)
    {
        // TODO: Implement burn() method.
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