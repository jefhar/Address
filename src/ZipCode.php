<?php
/**
 * PHP Version 7.2
 *
 * Address
 */

declare(strict_types=1);

namespace JefHar\Address;

class ZipCode
{

    private $zip5;

    public function __construct(string $ZipCode = null)
    {
        $this->zip5 = $ZipCode;
    }

    public function getZip5()
    {
        return $this->zip5;
    }
}
