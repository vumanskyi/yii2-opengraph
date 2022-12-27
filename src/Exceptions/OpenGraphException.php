<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Exceptions;

use Throwable;

class OpenGraphException extends \Exception
{
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
