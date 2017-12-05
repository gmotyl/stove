<?php

namespace Tests\Stove\Domain;

use PHPUnit\Framework\TestCase;
use Stove\Domain\Stove\EcoCoalHooper;

abstract class BaseDomainTest extends TestCase
{
    public function getEcoPeaHooperMock()
    {
        $hooper = $this->prophesize(EcoCoalHooper::class);

        return $hooper->reveal();
    }
}