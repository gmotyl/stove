<?php

namespace Tests\Stove\Domain\Fuel;

use Ramsey\Uuid\Uuid;
use Stove\Domain\Fuel\EcoPeaCoal;
use Stove\Domain\Fuel\EFuel;
use Tests\Stove\Domain\BaseDomainTest;

class EcoPeaCoalTest extends BaseDomainTest
{
    private const FUEL_NAME = 'Czarna Perła';

    public function testFuelHasProperType()
    {
        $fuel = $this->createEcoPeaCoalFuel(self::FUEL_NAME, 22);
        $type = $fuel->getType();

        $this->assertInstanceOf(EFuel::class, $type);
        $this->assertEquals(EFuel::ECO_PEA_COAL(), $type);
    }

    public function testFuelHasEnergyCapacity()
    {
        $fuel = $this->createEcoPeaCoalFuel(self::FUEL_NAME, 22);

        $this->assertEquals(22, $fuel->getEnergyCapacity());
    }

    public function testFuelHasName()
    {
        $name = self::FUEL_NAME;
        $fuel = $this->createEcoPeaCoalFuel($name, 22);

        $this->assertEquals($name, $fuel->getName());
    }

    private function createEcoPeaCoalFuel($name, $energyCapacity)
    {
        $id = Uuid::fromInteger(1);

        return new EcoPeaCoal($id, $name, $energyCapacity);
    }
}