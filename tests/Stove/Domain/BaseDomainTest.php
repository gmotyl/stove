<?php

namespace Tests\Stove\Domain;

use PHPUnit\Framework\TestCase;
use Stove\Domain\Fuel\EcoPeaCoal;
use Stove\Domain\Fuel\EFuel;
use Stove\Domain\Stove\EcoCoalHooper;

abstract class BaseDomainTest extends TestCase
{
    public function getEcoPeaHooperMock()
    {
        $hooper = $this->prophesize(EcoCoalHooper::class);

        return $hooper->reveal();
    }

    public function getEcoPeaCoalMock()
    {
        $fuel = $this->prophesize(EcoPeaCoal::class);
        $fuel->getType()->willReturn(EFuel::ECO_PEA_COAL());

        return $fuel->reveal();
    }
}