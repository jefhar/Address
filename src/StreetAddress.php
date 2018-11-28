<?php
/**
 * PHP Version 7.2
 *
 * Address
 */

declare(strict_types=1);

namespace JefHar\Address;

use JefHar\Address\StreetAddress\StreetName;
use JefHar\Address\StreetAddress\StreetNumber;

class StreetAddress
{
    /** @var StreetNumber */
    private $StreetNumber;
    /** @var StreetName */
    private $StreetName;

    public function __construct(?string $streetAddress = '')
    {
        $this->parseAddress($streetAddress . ' ');
    }

    private function parseAddress(string $streetAddress)
    {
        $number = $this->findNumber($streetAddress);
        $this->StreetNumber = new StreetNumber($number);

        $name = $this->findName($streetAddress);
        $this->StreetName = new StreetName($name);
    }

    /**
     * @param string $streetAddress
     * @return string
     */
    private function findNumber(string $streetAddress): string
    {
        $firstSpace = strpos($streetAddress, ' ');

        return substr($streetAddress, 0, $firstSpace);
    }

    private function findName(string $streetAddress): string
    {
        $firstSpace = stripos($streetAddress, ' ');

        return trim(substr($streetAddress, $firstSpace));
    }

    public function getStreetNumber(): StreetNumber
    {

        return $this->StreetNumber;
    }

    public function getStreetName(): StreetName
    {

        return $this->StreetName;
    }

    public function getStreet(): string
    {
        return $this->StreetName->getName();
    }

    public function getNumber(): string
    {
        return $this->StreetNumber->getNumber();
    }
}
