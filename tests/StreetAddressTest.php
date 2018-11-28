<?php

namespace JefHar\Tests;

use JefHar\Address\StreetAddress;
use JefHar\Address\StreetAddress\StreetNumber;
use PHPUnit\Framework\TestCase;

class StreetAddressTest extends TestCase
{
    /**
     * @test
     */
    public function canInstantiateClass()
    {
        $StreetAddress = new StreetAddress();
        $this->assertInstanceOf(StreetAddress::class, $StreetAddress);
    }

    /**
     * @test
     */
    public function canSeparateStreetNameFromAddress()
    {
        $Washington = new StreetAddress('5500 Washington');
        $this->assertInstanceOf(StreetNumber::class, $Washington->getStreetNumber());
        $this->assertEquals('5500', $Washington->getStreetNumber()->getNumber());

        $Broadway = new StreetAddress('1414 Broadway');
        $this->assertInstanceOf(StreetNumber::class, $Broadway->getStreetNumber());
        $this->assertEquals('1414', $Broadway->getStreetNumber()->getNumber());

        $BlankStreet = new StreetAddress();
        $this->assertInstanceOf(StreetNumber::class, $BlankStreet->getStreetNumber());
        $this->assertInstanceOf(StreetAddress\StreetName::class, $BlankStreet->getStreetName());
        $this->assertEquals('', $BlankStreet->getNumber());
        $this->assertEquals('', $BlankStreet->getStreet());
    }

    /**
     * @test
     */
    public function addressSeparatesTheStreetName()
    {
        $StreetAddress = new StreetAddress('5500 Washington Drive East');
        $this->assertInstanceOf(StreetAddress\StreetName::class, $StreetAddress->getStreetName());
        $this->assertEquals('Washington Drive East', $StreetAddress->getStreetName()->getName());
        $this->assertEquals('Washington Drive East', $StreetAddress->getStreet());
    }
}
