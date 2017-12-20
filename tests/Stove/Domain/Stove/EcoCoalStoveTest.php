<?php

namespace Tests\Stove\Domain\Stove;


use Stove\Domain\Fuel\EcoPeaCoal;
use Stove\Domain\Fuel\EFuel;
use Stove\Domain\Stove\EcoPeaCoal\Hooper;
use Stove\Domain\Stove\EcoPeaCoal\Stove;
use Tests\Stove\Domain\BaseDomainTest;

class EcoCoalStoveTest extends BaseDomainTest
{
    public function testEcoPeaCoalStoveHasProperFuelType()
    {
        $stove = $this->createStove();
        $type = $stove->getFuelType();

        $this->assertInstanceOf(EFuel::class, $type);
        $this->assertEquals(EFuel::ECO_PEA_COAL(), $type);
    }

    public function testStoveCanBurnFuelFromHooper()
    {
        $hooper = $this->prophesize(Hooper::class);
        $hooper->removeFuel(200)
            ->shouldBeCalled();

        $stove = new Stove($hooper->reveal());
        $stove->burn(200);
    }

    private function createStove()
    {
        $hooper = $this->getEcoPeaHooperMock();

        return new Stove($hooper);
    }
}