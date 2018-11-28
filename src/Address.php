<?php
/**
 * PHP Version 7.2
 *
 * Address
 */

declare(strict_types=1);

namespace JefHar\Address;

class Address
{
    /** @var ZipCode */
    private $ZipCode;

    /**
     * @param ZipCode $ZipCode
     */
    public function addZipCode(ZipCode $ZipCode)
    {
        $this->ZipCode = $ZipCode;
    }

    public function getZipCode(): ZipCode
    {
        return $this->ZipCode;
    }

    /**
     * @return string
     * @throws Exception\InvalidZipCode
     */
    public function getFullZip(): string
    {
        if (is_null($this->ZipCode)) {
            $this->ZipCode = new ZipCode();
        }
        return $this->ZipCode->getFullZip();
    }
}
