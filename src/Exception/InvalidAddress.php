<?php
/**
 * PHP Version 7.2
 *
 * Address
 */
declare(strict_types=1);

namespace JefHar\Address\Exception;

class InvalidAddress extends \Exception
{
    const CODE_WRONG_NUMBER_OF_ARGUMENTS = 1;
    const MESSAGE_WRONG_NUMBER_OF_ARGUMENTS = 'Incorrect number of arguments provided to Address';
}
