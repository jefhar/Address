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
        $streetAddress = new StreetAddress();
        $this->assertInstanceOf(StreetAddress::class, $streetAddress);
    }

    /**
     * @test
     */
    public function canSeparateStreetNameFromAddress()
    {
        $washington = new StreetAddress('5500 Washington');
        $this->assertInstanceOf(StreetNumber::class, $washington->getStreetNumber());
        $this->assertEquals('5500', $washington->getStreetNumber()->getNumber());

        $broadway = new StreetAddress('1414 Broadway');
        $this->assertInstanceOf(StreetNumber::class, $broadway->getStreetNumber());
        $this->assertEquals('1414', $broadway->getStreetNumber()->getNumber());

        $blankStreet = new StreetAddress();
        $this->assertInstanceOf(StreetNumber::class, $blankStreet->getStreetNumber());
        $this->assertInstanceOf(StreetAddress\StreetName::class, $blankStreet->getStreetName());
        $this->assertEquals('', $blankStreet->getNumber());
        $this->assertEquals('', $blankStreet->getStreet());
    }

    /**
     * @test
     */
    public function addressSeparatesTheStreetName()
    {
        $streetAddress = new StreetAddress('5500 Washington Drive East');
        $this->assertInstanceOf(StreetAddress\StreetName::class, $streetAddress->getStreetName());
        $this->assertEquals('Washington Drive East', $streetAddress->getStreetName()->getName());
        $this->assertEquals('Washington Drive East', $streetAddress->getStreet());
    }

    public function streetAddressReturnsAddress()
    {
        $streetAddress = new StreetAddress('123 Main Street');
        $this->assertEquals('123 Main Street', $streetAddress->getAddress());
    }
}
