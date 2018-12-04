<?php
/**
 * PHP Version 7.2
 *
 * Address
 */

declare(strict_types=1);

namespace JefHar\Address;

class State
{

    /** @var string */
    private $name = '';

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $State)
    {
        $this->name = $State;
    }
}
