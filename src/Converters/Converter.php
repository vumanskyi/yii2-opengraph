<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Converters;

interface Converter
{
    /**
     * @param mixed $param
     *
     * @return string
     */
    public static function convert($param): string;
}
