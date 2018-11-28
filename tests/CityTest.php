<?php

namespace JefHar\Tests;

use JefHar\Address\City;
use PHPUnit\Framework\TestCase;

class CityTest extends TestCase
{
    /**
     * @test
     */
    public function canInstantiateCity()
    {
        $City = new City();
        $this->assertInstanceOf(City::class, $City);
        $this->assertEquals('', $City->getName());
    }

    /**
     * @test
     */
    public function getCityReturnsSetCity()
    {
        $City = new City();
        $City->setName('Boise');
        $this->assertEquals('Boise', $City->getName());

        $City->setName('Amarillo');
        $this->assertEquals('Amarillo', $City->getName());
    }
}
