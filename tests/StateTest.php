<?php

namespace JefHar\Tests;

use JefHar\Address\State;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
    /**
     * @test
     */
    public function canInstantiateStateClass()
    {
        $State = new State();
        $this->assertInstanceOf(State::class, $State);
    }

    /**
     * @test
     */
    public function stateGetsTheSetName()
    {
        $State = new State();
        $State->setName('Iowa');
        $this->assertEquals('Iowa', $State->getName());

        $State->setName('Ohio');
        $this->assertEquals('Ohio', $State->getName());

        $BlankState = new State();
        $this->assertEquals('', $BlankState->getName());
    }
}
