<?php

namespace JefHar\Tests;

use JefHar\Address\ZipCode;
use PHPUnit\Framework\TestCase;

class ZipCodeTest extends TestCase
{
    /**
     * @test
     */
    public function canInstantiateZipCodeClass() {
        $zipCode = new ZipCode();
        $this->assertInstanceOf(ZipCode::class, $zipCode);
    }

    /**
     * @test
     */
    public function canInstantateWithZip5() {
        $zipCode = new ZipCode('12345');
        $this->assertInstanceOf(ZipCode::class, $zipCode);

        $this->assertEquals($zipCode->getZip5(), '12345');
    }
}
