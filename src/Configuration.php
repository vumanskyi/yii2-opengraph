<?php

declare(strict_types=1);

namespace umanskyi31\opengraph;

/**
 * This is an implementation of configuration for open graph
 * With this configuration you can override exists tags and set own implmentation.
 *
 * @author Vladyslav Umanskyi <vladumanskyi@gmail.com>
 *
 * @version 2.1.1
 */
interface Configuration
{
    const VERSION = '2.1.1';

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
