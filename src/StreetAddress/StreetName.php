<?php
/**
 * PHP Version 7.2
 *
 * Address
 */

declare(strict_types=1);

namespace JefHar\Address\StreetAddress;

class StreetName
{

    /** @var string */
    private $name;

    public function __construct($streetName)
    {
        $this->name = $streetName;
    }

    public function getName()
    {
        return $this->name;
    }
}
