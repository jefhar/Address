<?php
/**
 * PHP Version 7.2
 *
 * Address
 */

declare(strict_types=1);

namespace JefHar\Address\Exception;

class InvalidZipCode extends \Exception
{
    const CODE_WRONG_LENGTH = 1;
    const MESSAGE_WRONG_LENGTH = 'The ZipCode was not the correct length.';
}
