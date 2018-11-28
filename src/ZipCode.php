<?php
/**
 * PHP Version 7.2
 *
 * Address
 */

declare(strict_types=1);

namespace JefHar\Address;

use JefHar\Address\Exception\InvalidZipCode;

class ZipCode
{
    private $zip5 = '00000';
    private $zip9 = '000000000';

    /**
     * ZipCode constructor.
     *
     * @param string|null $ZipCode
     * @throws InvalidZipCode
     */
    public function __construct(?string $ZipCode = '000000000')
    {
        $this->parseZipCode($ZipCode ?? '000000000');
    }

    /**
     * @param string $ZipCode
     * @return
     * @throws InvalidZipCode
     */
    private function parseZipCode(string $ZipCode = '000000000')
    {
        $ZipCode = str_replace('-', '', $ZipCode);

        if (strlen($ZipCode) === 0) {
            return $this->parseZipCode();
        }

        if ((strlen($ZipCode) !== 9) && (strlen($ZipCode) !== 5)) {
            throw new InvalidZipCode(InvalidZipCode::MESSAGE_WRONG_LENGTH, InvalidZipCode::CODE_WRONG_LENGTH);
        }

        $this->zip5 = substr(str_pad($ZipCode, 9, '0', STR_PAD_RIGHT), 0, 5);
        $this->zip9 = substr(str_pad($ZipCode, 9, '0', STR_PAD_RIGHT), 0, 9);

        return null;
    }

    /**
     * @return string
     */
    public function getZip5(): string
    {
        return $this->zip5;
    }

    /**
     * @return string
     */
    public function getZip9(): string
    {
        return $this->zip9;
    }

    /**
     * @param string $string
     * @throws InvalidZipCode
     */
    public function setZip5(string $string)
    {
        $this->parseZipCode(str_pad($string, 5, '0', STR_PAD_LEFT));
    }

    /**
     * @param string $string
     * @throws InvalidZipCode
     */
    public function setZip9(string $string)
    {
        $this->parseZipCode(str_pad($string, 9, '0', STR_PAD_LEFT));
    }

    /**
     * @return string
     */
    public function getFullZip()
    {
        return substr($this->zip9, 0, 5) . '-' . substr($this->zip9, 5, 4);
    }

    /**
     * @param string $string
     * @throws InvalidZipCode
     */
    public function setZip(string $string)
    {
        $this->parseZipCode($string);
    }
}
