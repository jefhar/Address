<?php
/**
 * Address
 * SecondaryUnit.php
 * Copyright 2018 Jeff Harris, C11k.
 * PHP Version 7.2
 */
declare(strict_types=1);

namespace JefHar\Address\StreetAddress;

class SecondaryUnit
{

    /** @var string */
    private $designator = '';

    public function __construct(string $designator = '')
    {
        $this->designator = $designator;
    }

    /**
     * @return string
     */
    public function getDesignator(): string
    {
        return $this->designator;
    }
}
