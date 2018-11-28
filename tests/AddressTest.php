<?php

namespace JefHar\Tests;

use JefHar\Address\Address;
use JefHar\Address\ZipCode;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    /**
     * @test
     */
    public function canInstantiateAddressClass()
    {
        $address = new Address();
        $this->assertInstanceOf(Address::class, $address);
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function addressCanAddZipCode()
    {
        $Address = new Address();
        $ZipCode = new ZipCode();
        $Address->addZipCode($ZipCode);
        $this->assertInstanceOf(ZipCode::class, $Address->getZipCode());
        $this->assertEquals('000000000', $Address->getZipCode()->getZip9());
        $this->assertEquals('00000-0000', $Address->getFullZip());

        $ZipCode->setZip5('123451234');
        $this->assertEquals('12345-1234', $Address->getFullZip());

        $Address = new Address();
        $this->assertEquals('00000-0000', $Address->getFullZip());
    }
}
