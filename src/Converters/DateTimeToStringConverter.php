<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Converters;

class DateTimeToStringConverter implements Converter
{
    public static function convert($param): string
    {
        return $param->format('Y-m-d');
    }
}
