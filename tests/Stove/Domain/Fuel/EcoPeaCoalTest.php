<?php

namespace Tests\Stove\Domain\Fuel;

use Stove\Domain\Fuel\EcoPeaCoal;
use Stove\Domain\Fuel\EFuel;
use Tests\Stove\Domain\BaseDomainTest;

class EcoPeaCoalTest extends BaseDomainTest
{
    public function testFuelHasProperType()
    {
        $fuel = $this->createEcoPeaCoalFuel('Czarna Perła', 22);
        $type = $fuel->getType();

        $this->assertInstanceOf(EFuel::class, $type);
        $this->assertEquals(EFuel::ECO_PEA_COAL(), $type);
    }

    public function testFuelHasEnergyCapacity()
    {
        $fuel = $this->createEcoPeaCoalFuel('Czarna Perła', 22);

        $this->assertEquals(22, $fuel->getEnergyCapacity());
    }

    public function testFuelHasName()
    {
        $name = 'Czarna Perła';
        $fuel = $this->createEcoPeaCoalFuel($name, 22);

        $this->assertEquals($name, $fuel->getName());
    }

    private function createEcoPeaCoalFuel($name, $energyCapacity)
    {
        return new EcoPeaCoal($name, $energyCapacity);
    }
}