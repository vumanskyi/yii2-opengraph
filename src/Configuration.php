<?php

declare(strict_types=1);

namespace umanskyi31\opengraph;

/**
 * This is an implementation of configuration for open graph
 * With this configuration you can override exists tags and set own implmentation.
 *
 * @author Vladyslav Umanskyi <vladumanskyi@gmail.com>
 *
 * @version 3.0.0
 */
interface Configuration
{
    public const VERSION = '3.0.0';

    /**
     * Consist all available tags.
     *
     * @return array
     */
    public function tags(): array;

    /**
     * @param array $data
     *
     * @return string|array|void
     */
    public function render(array $data);
}
