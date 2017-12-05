<?php

namespace Stove\Domain;

use Stove\Domain\Fuel\EFuel;

interface IStove
{
    public function lit(\DateTime $date = null);
    public function putOut(string $reason, \DateTime $date = null);
    public function burn(int $amount, \DateTime $date = null);
    public function clean(\DateTime $date = null);
    public function getFuelType(): EFuel;
}