<?php

namespace JefHar\Tests;

use JefHar\Address\Address;
use JefHar\Address\City;
use JefHar\Address\State;
use JefHar\Address\StreetAddress;
use JefHar\Address\StreetAddress\SecondaryUnit;
use JefHar\Address\ZipCode;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidAddress
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function canInstantiateAddressClass()
    {
        $address = new Address();
        $this->assertInstanceOf(Address::class, $address);
        $this->assertInstanceOf(City::class, $address->getCity());
        $this->assertInstanceOf(SecondaryUnit::class, $address->getSecondaryUnit());
        $this->assertInstanceOf(State::class, $address->getState());
        $this->assertInstanceOf(StreetAddress::class, $address->getStreetAddress());
        $this->assertInstanceOf(ZipCode::class, $address->getZipCode());
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidAddress
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function addressCanAddZipCode()
    {
        $Address = new Address();
        $ZipCode = new ZipCode();
        $Address->setZipCode($ZipCode);
        $this->assertInstanceOf(ZipCode::class, $Address->getZipCode());
        $this->assertEquals('000000000', $Address->getZipCode()->getZip9());
        $this->assertEquals('00000-0000', $Address->getFullZip());

        $ZipCode->setZip5('123451234');
        $this->assertEquals('12345-1234', $Address->getFullZip());

        $Address = new Address();
        $this->assertEquals('00000-0000', $Address->getFullZip());
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidAddress
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function addressCanAddACity()
    {
        $Address = new Address();
        $Boise = new City('Boise');
        $Address->setCity($Boise);

        $this->assertEquals('Boise', $Address->getCityName());
        $this->assertInstanceOf(City::class, $Address->getCity());
        $this->assertEquals('Boise', $Address->getCity()->getName());

        $Austin = new City('Austin');
        $Address->setCity($Austin);

        $this->assertEquals('Austin', $Address->getCityName());
        $this->assertInstanceOf(City::class, $Address->getCity());
        $this->assertEquals('Austin', $Address->getCity()->getName());

        $BlankAddress = new Address();
        $this->assertEquals('', $BlankAddress->getCityName());
        $this->assertInstanceOf(City::class, $BlankAddress->getCity());
        $this->assertEquals('', $BlankAddress->getCity()->getName());
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidAddress
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function addressCanAddSecondaryUnitDesignation()
    {
        $blankAddress = new Address();
        $this->assertInstanceOf(SecondaryUnit::class, $blankAddress->getSecondaryUnit());
        $this->assertEquals('', $blankAddress->getSecondaryUnitDesignation());

        $suite = new Address();
        $secondarySuite = new SecondaryUnit('Suite 425');
        $suite->setSecondaryUnit($secondarySuite);
        $this->assertEquals('Suite 425', $suite->getSecondaryUnitDesignation());

        $apartment = new Address();
        $secondaryApartment = new SecondaryUnit('Apartment 12');
        $apartment->setSecondaryUnit($secondaryApartment);
        $this->assertEquals('Apartment 12', $apartment->getSecondaryUnitDesignation());
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidAddress
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function addressCanAddStreetAddress()
    {
        $address = new Address();
        $streetAddress = new StreetAddress('123 Main Street');
        $address->setStreetAddress($streetAddress);
        $this->assertInstanceOf(StreetAddress::class, $address->getStreetAddress());
        $this->assertEquals('123 Main Street', $address->getAddressLine());

        $address = new Address();
        $streetAddress = new StreetAddress('234 Washington Blvd.');
        $address->setStreetAddress($streetAddress);
        $this->assertEquals('234 Washington Blvd.', $address->getAddressLine());
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidAddress
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function addressCanAddCity()
    {
        $address = new Address();
        $state = new State('CA');
        $address->setState($state);
        $this->assertInstanceOf(State::class, $address->getState());
        $this->assertEquals('CA', $address->getStateName());
    }

    /**
     * @test
     * @throws \JefHar\Address\Exception\InvalidAddress
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function addressCanCreateItselfFromStrings()
    {
        $address1 = new Address('200 Central Ave');
        $this->assertInstanceOf(Address::class, $address1);
        $this->assertInstanceOf(StreetAddress::class, $address1->getStreetAddress());
        $this->assertEquals('200 Central Ave', $address1->getAddressLine());

        $address4 = new Address('123 Main Street', 'SomeTown', 'ST', '12345');
        $this->assertInstanceOf(Address::class, $address4);
        $this->assertInstanceOf(City::class, $address4->getCity());
        $this->assertInstanceOf(State::class, $address4->getState());
        $this->assertInstanceOf(StreetAddress::class, $address4->getStreetAddress());
        $this->assertInstanceOf(ZipCode::class, $address4->getZipCode());

        $this->assertEquals('123 Main Street', $address4->getAddressLine());
        $this->assertEquals('12345-0000', $address4->getFullZip());
        $this->assertEquals('SomeTown', $address4->getCityName());
        $this->assertEquals('ST', $address4->getStateName());

        $address5 = new Address('20202 Broadway', 'Apartment 501b', 'SomeOtherTown', 'TS', '98765-4321');
        $this->assertInstanceOf(Address::class, $address5);
        $this->assertInstanceOf(City::class, $address5->getCity());
        $this->assertInstanceOf(SecondaryUnit::class, $address5->getSecondaryUnit());
        $this->assertInstanceOf(State::class, $address5->getState());
        $this->assertInstanceOf(StreetAddress::class, $address5->getStreetAddress());
        $this->assertInstanceOf(ZipCode::class, $address5->getZipCode());

        $this->assertEquals('20202 Broadway', $address5->getAddressLine());
        $this->assertEquals('98765-4321', $address5->getFullZip());
        $this->assertEquals('Apartment 501b', $address5->getSecondaryUnitDesignation());
        $this->assertEquals('SomeOtherTown', $address5->getCityName());
        $this->assertEquals('TS', $address5->getStateName());
    }

    /**
     * @test
     * @expectedException \JefHar\Address\Exception\InvalidAddress
     * @throws \JefHar\Address\Exception\InvalidZipCode
     */
    public function addressThrowsInvalidAddress()
    {
        $address = new Address('123 Main Street', 'ambiguous string');
    }
}
