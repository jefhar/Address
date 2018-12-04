<?php
/**
 * Address
 * SecondaryUnitTest.php
 * Copyright 2018 Jeff Harris, C11k.
 * PHP Version 7.2
 */

namespace JefHar\Tests;

use JefHar\Address\StreetAddress\SecondaryUnit;
use PHPUnit\Framework\TestCase;

class SecondaryUnitTest extends TestCase
{
    /**
     * @test
     */
    public function canInstantiateClass()
    {
        $secondaryUnit = new SecondaryUnit();
        $this->assertInstanceOf(SecondaryUnit::class, $secondaryUnit);
        $this->assertEquals('', $secondaryUnit->getDesignator());

        $secondaryUnit = new SecondaryUnit('Suite 425');
        $this->assertInstanceOf(SecondaryUnit::class, $secondaryUnit);
        $this->assertEquals('Suite 425', $secondaryUnit->getDesignator());
    }
}
