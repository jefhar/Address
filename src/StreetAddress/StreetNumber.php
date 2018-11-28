<?php
/**
 * PHP Version 7.2
 *
 * Address
 */

declare(strict_types=1);

namespace JefHar\Address\StreetAddress;

class StreetNumber
{

    /** @var string */
    private $number = '';

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}
