<?php

namespace JefHar\Tests;

use JefHar\Address\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    /**
     * @test
     */
    public function canInstantiateAddressClass()
    {
        $address = new Address();
        $this->assertInstanceOf(\JefHar\Address\Address::class, $address);
    }
}
