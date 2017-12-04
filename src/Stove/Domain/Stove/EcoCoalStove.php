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
     * EcoCoalStove constructor.
     */
    public function __construct()
    {
        $this->fuelType = EFuel::ECO_PEA_COAL();
    }

    public function lit(\DateTime $date = null)
    {
        // TODO: Implement lit() method.
    }

    public function putOut(string $reason, \DateTime $date = null)
    {
        // TODO: Implement putOut() method.
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