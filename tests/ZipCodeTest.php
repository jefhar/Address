<?php

namespace JefHar\Tests;

use JefHar\Address\ZipCode;
use PHPUnit\Framework\TestCase;

class ZipCodeTest extends TestCase
{
    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function canInstantiateZipCodeClass()
    {
        $zipCode = new ZipCode();
        $this->assertInstanceOf(ZipCode::class, $zipCode);

        $zipCode = new ZipCode('');
        $this->assertInstanceOf(ZipCode::class, $zipCode);

        $zipCode = new ZipCode(null);
        $this->assertInstanceOf(ZipCode::class, $zipCode);
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function canInstantiateWithZip5()
    {
        $zip5 = '12345';
        $zipCode = new ZipCode($zip5);
        $this->assertInstanceOf(ZipCode::class, $zipCode);
        $this->assertEquals($zipCode->getZip5(), $zip5);

        $zip5 = '00011';
        $zipCode = new ZipCode($zip5);
        $this->assertEquals($zipCode->getZip5(), $zip5);

        $zip5 = '99999';
        $zipCode = new ZipCode($zip5);
        $this->assertEquals($zipCode->getZip5(), $zip5);
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function canInstantiateWithZip9()
    {
        $zip9 = '123456789';
        $zipCode = new ZipCode($zip9);
        $this->assertInstanceOf(ZipCode::class, $zipCode);
        $this->assertEquals($zipCode->getZip9(), $zip9);

        $zip9 = '008675309';
        $zipCode = new ZipCode($zip9);
        $this->assertEquals($zipCode->getZip9(), $zip9);

        $zip9 = '867530900';
        $zipCode = new ZipCode($zip9);
        $this->assertEquals($zipCode->getZip9(), $zip9);
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function zipCodeInstantiatesWithWorkableDefaults()
    {
        $zip9 = '123456789';
        $zip5 = '12345';
        $ZipCode = new ZipCode();
        $this->assertEquals($ZipCode->getZip9(), '000000000');
        $this->assertEquals($ZipCode->getZip5(), '00000');
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function zipCodeCalculates9From5()
    {
        $zip9 = '123450000';
        $zip5 = '12345';
        $ZipCode = new ZipCode($zip5);
        $this->assertEquals($ZipCode->getZip9(), $zip9);
        $this->assertEquals($ZipCode->getZip5(), $zip5);

        $zip9 = '135792468';
        $zip5 = '13579';
        $ZipCode = new ZipCode($zip9);
        $this->assertEquals($ZipCode->getZip9(), $zip9);
        $this->assertEquals($ZipCode->getZip5(), $zip5);
    }

    /**
     * @test
     * @expectedException \JefHar\Address\Exception\InvalidZipCode
     */
    public function zipCodeOf4CharactersThrowsException()
    {
        $ZipCode = new ZipCode('1234');
    }

    /**
     * @test
     * @expectedException \JefHar\Address\Exception\InvalidZipCode
     */
    public function zipCodeOf6CharactersThrowsException()
    {
        $ZipCode = new ZipCode('123456');
    }

    /**
     * @test
     * @expectedException \JefHar\Address\Exception\InvalidZipCode
     */
    public function zipCodeOf7CharactersThrowsException()
    {
        $ZipCode = new ZipCode('1234567');
    }

    /**
     * @test
     * @expectedException \JefHar\Address\Exception\InvalidZipCode
     */
    public function zipCodeOf8CharactersThrowsException()
    {
        $ZipCode = new ZipCode('12341234');
    }

    /**
     * @test
     * @expectedException \JefHar\Address\Exception\InvalidZipCode
     */
    public function zipCodeOf10CharactersThrowsException()
    {
        $ZipCode = new ZipCode('1234567890');
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function setZip5Sets9Correctly()
    {
        $ZipCode = new ZipCode();
        $ZipCode->setZip5('12345');
        $this->assertEquals('12345', $ZipCode->getZip5());
        $this->assertEquals('123450000', $ZipCode->getZip9());

        $ZipCode->setZip5('54321');
        $this->assertEquals('54321', $ZipCode->getZip5());
        $this->assertEquals('543210000', $ZipCode->getZip9());
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function setZip9Sets5Correctly()
    {
        $ZipCode = new ZipCode();
        $ZipCode->setZip9('123456789');
        $this->assertEquals('123456789', $ZipCode->getZip9());
        $this->assertEquals('12345', $ZipCode->getZip5());

        $ZipCode->setZip9('987654321');
        $this->assertEquals('987654321', $ZipCode->getZip9());
        $this->assertEquals('98765', $ZipCode->getZip5());
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function getFullZipPutsSpacerCorrectly()
    {
        $ZipCode = new ZipCode();
        $ZipCode->setZip9('123456789');
        $this->assertEquals('12345-6789', $ZipCode->getFullZip());

        $ZipCode->setZip9('987654321');
        $this->assertEquals('98765-4321', $ZipCode->getFullZip());

        $ZipCode->setZip5('13579');
        $this->assertEquals('13579-0000', $ZipCode->getFullZip());

        $ZipCode->setZip5('24680');
        $this->assertEquals('24680-0000', $ZipCode->getFullZip());
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function zipCodeRemovesDashesFromSetters() {
        $ZipCode = new ZipCode('12345-1234');
        $this->assertEquals('12345-1234', $ZipCode->getFullZip());
        $this->assertEquals('12345', $ZipCode->getZip5());
        $this->assertEquals('123451234', $ZipCode->getZip9());

        $ZipCode->setZip('54321-4321');
        $this->assertEquals('54321-4321', $ZipCode->getFullZip());
        $this->assertEquals('54321', $ZipCode->getZip5());
        $this->assertEquals('543214321', $ZipCode->getZip9());
    }
}
