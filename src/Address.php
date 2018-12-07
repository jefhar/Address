<?php
/**
 * PHP Version 7.2
 *
 * Address
 */

declare(strict_types=1);

namespace JefHar\Address;

use JefHar\Address\Exception\InvalidAddress;
use JefHar\Address\StreetAddress\SecondaryUnit;

class Address
{
    /** @var City */
    private $City;

    /** @var SecondaryUnit */
    private $SecondaryUnit;

    /** @var State */
    private $State;

    /** @var StreetAddress */
    private $StreetAddress;

    /** @var ZipCode */
    private $ZipCode;

    /**
     * Address constructor.
     *
     * @throws Exception\InvalidZipCode
     * @throws InvalidAddress
     */
    public function __construct()
    {
        $numArgs = func_num_args();

        switch ($numArgs) {
            case 0:
                break;

            case 1:
                $this->setStreetAddress(new StreetAddress(func_get_arg(0)));
                break;

            case 4:
                $this->setStreetAddress(new StreetAddress(func_get_arg(0)));
                $this->setCity(new City(func_get_arg(1)));
                $this->setState(new State(func_get_arg(2)));
                $this->setZipCode(new ZipCode(func_get_arg(3)));
                break;

            case 5:
                $this->setStreetAddress(new StreetAddress(func_get_arg(0)));
                $this->setSecondaryUnit(new SecondaryUnit(func_get_arg(1)));
                $this->setCity(new City(func_get_arg(2)));
                $this->setState(new State(func_get_arg(3)));
                $this->setZipCode(new ZipCode(func_get_arg(4)));
                break;

            default:
                throw new InvalidAddress(
                    InvalidAddress::MESSAGE_WRONG_NUMBER_OF_ARGUMENTS,
                    InvalidAddress::CODE_WRONG_NUMBER_OF_ARGUMENTS
                );
        }
    }

    /**
     * @return string
     * @throws Exception\InvalidZipCode
     */
    public function getFullZip(): string
    {
        return $this->getZipCode()->getFullZip();
    }

    /**
     * @return ZipCode
     * @throws Exception\InvalidZipCode
     */
    public function getZipCode(): ZipCode
    {
        if (is_null($this->ZipCode)) {
            $this->ZipCode = new ZipCode();
        }

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
     */
    public function getCityName(): string
    {
        return $this->getCity()->getName();
    }

    /**
     * @return City
     */
    public function getCity(): City
    {
        if (is_null($this->City)) {
            $this->City = new City();
        }

        return $this->City;
    }

    public function setCity(City $City)
    {
        $this->City = $City;
    }

    /**
     * @return string
     */
    public function getSecondaryUnitDesignation(): string
    {
        return $this->getSecondaryUnit()->getDesignator();
    }

    /**
     * @return SecondaryUnit
     */
    public function getSecondaryUnit(): SecondaryUnit
    {
        if (is_null($this->SecondaryUnit)) {
            $this->SecondaryUnit = new SecondaryUnit();
        }

        return $this->SecondaryUnit;
    }

    /**
     * @param SecondaryUnit $secondaryUnit
     */
    public function setSecondaryUnit(SecondaryUnit $secondaryUnit)
    {
        $this->SecondaryUnit = $secondaryUnit;
    }

    /**
     * @return string
     */
    public function getAddressLine(): string
    {
        return $this->getStreetAddress()->getAddress();
    }

    /**
     * @return StreetAddress
     */
    public function getStreetAddress(): StreetAddress
    {
        if (is_null($this->StreetAddress)) {
            $this->StreetAddress = new StreetAddress();
        }

        return $this->StreetAddress;
    }

    /**
     * @param StreetAddress $streetAddress
     */
    public function setStreetAddress(StreetAddress $streetAddress)
    {
        $this->StreetAddress = $streetAddress;
    }

    /**
     * @return string
     */
    public function getStateName(): string
    {
        return $this->getState()->getName();
    }

    /**
     * @return State
     */
    public function getState(): State
    {
        if (is_null($this->State)) {
            $this->State = new State();
        }

        return $this->State;
    }

    /**
     * @param State $state
     */
    public function setState(State $state)
    {
        $this->State = $state;
    }
}
