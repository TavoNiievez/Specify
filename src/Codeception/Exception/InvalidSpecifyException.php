<?php declare(strict_types=1);

namespace Codeception\Exception;

use InvalidArgumentException;

final class InvalidSpecifyException extends InvalidArgumentException
{
    public function __construct($specifyName, $actual)
    {
        $message = sprintf(
            "%s is not a valid specify, since %s is invalid.",
            (string) $actual,
            $specifyName
        );

        parent::__construct($message);
    }
}