<?php

namespace Tests\Stove\Domain\Stove;


use Stove\Domain\Fuel\EFuel;
use Stove\Domain\Stove\EcoCoalStove;
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

    private function createStove()
    {
        $hooper = $this->getEcoPeaHooperMock();

        return new EcoCoalStove($hooper);
    }
}