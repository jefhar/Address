<?php
/**
 * PHP Version 7.2
 *
 * Address
 */

declare(strict_types=1);

namespace JefHar\Address;

use JefHar\Address\StreetAddress\SecondaryUnit;

class Address
{
    /** @var City */
    private $City;
    /** @var ZipCode */
    private $ZipCode;
    /** @var SecondaryUnit */
    private $secondaryUnit;

    /**
     * @return ZipCode
     */
    public function getZipCode(): ZipCode
    {
        return $this->ZipCode;
    }

    /**
     * @param ZipCode $ZipCode
     */
    public function setZipCode(ZipCode $ZipCode)
    {
        $this->ZipCode = $ZipCode;
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

    /**
     * @param City $City
     */
    public function setCity(City $City)
    {
        $this->City = $City;
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        if (is_null($this->City)) {
            $this->City = new City();
        }

        return $this->City->getName();
    }

    /**
     * @return City
     */
    public function getCity(): City
    {
        return $this->City;
    }

    public function getSecondaryUnit(): SecondaryUnit
    {
        if (is_null($this->secondaryUnit)) {
            $this->secondaryUnit = new SecondaryUnit();
        }

        return $this->secondaryUnit;
    }

    public function addSecondaryUnit(SecondaryUnit $secondaryUnit)
    {
        $this->secondaryUnit = $secondaryUnit;
    }

    public function getSecondaryUnitDesignation(): string
    {
        return $this->getSecondaryUnit()->getDesignator();
    }
}
