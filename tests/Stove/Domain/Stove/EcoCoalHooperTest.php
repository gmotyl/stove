<?php

namespace Tests\Hooper\Domain\Hooper;

use Stove\Domain\Fuel\Basket;
use Stove\Domain\Fuel\EFuel;
use Stove\Domain\Stove\EcoCoalHooper;
use Tests\Stove\Domain\BaseDomainTest;

class EcoCoalHooperTest extends BaseDomainTest
{
    public function testEcoPeaCoalHooperHasProperFuelType()
    {
        $hooper = $this->createHooper();
        $type = $hooper->getFuelType();

        $this->assertInstanceOf(EFuel::class, $type);
        $this->assertEquals(EFuel::ECO_PEA_COAL(), $type);
    }

    /**
     * @expectedException \Stove\Domain\Fuel\Exception\IncorrectFuelTypeException
     */
    public function testEcoPeaCoalHooperDontAcceptFuelOfWrongType()
    {
        $hooper = $this->createHooper();

        $hooper->addFuel( EFuel::COAL(), 1);
    }

    public function testAddFuel()
    {
        $hooper = $this->createHooper();

        $this->assertEquals(0, $hooper->getAmount());

        $hooper->addFuel(EFuel::ECO_PEA_COAL(), 100);

        $this->assertEquals(100, $hooper->getAmount());
    }


    public function testSetAmountOnContructFuel()
    {
        $hooper = $this->createHooper(500);

        $this->assertEquals(500, $hooper->getAmount());
    }

    public function testRemoveFuel()
    {
        $hooper = $this->createHooper(500);

        $hooper->removeFuel(300);

        $this->assertEquals(200, $hooper->getAmount());
    }

    /**
     * @expectedException \Stove\Domain\Stove\Exception\IncorrectAmountExeption
     */
    public function testCantRemoveMoreFuelThanHooperAmount()
    {
        $hooper = $this->createHooper(100);

        $hooper->removeFuel(300);
    }

    public function testBasketCanBeAddedToStove()
    {
        $hooper = $this->createHooper();
        $basket = $this->prophesize(Basket::class);

        $basket->getAmount()->willReturn(100);
        $basket->getFuelType()->willReturn(EFuel::ECO_PEA_COAL());
        $basket = $basket->reveal();

        $this->assertEquals(0, $hooper->getAmount());
        $hooper->addBaskets($basket, 4);
        $this->assertEquals(400, $hooper->getAmount());
    }

    /**
     * @param int $amount
     *
     * @return EcoCoalHooper
     */
    private function createHooper($amount = 0): EcoCoalHooper
    {
        $hooper = new EcoCoalHooper($amount);
        return $hooper;
    }
}
