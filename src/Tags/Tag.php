<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Configuration;

abstract class Tag
{
    public const OG_PREFIX = 'og:';

    private Configuration $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getOpenGraph(): Configuration
    {
        return $this->configuration;
    }

    public function additionalRender(array $data = [], string $prefixKey = '', bool $useKey = false)
    {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                continue;
            }

            $property = $useKey ? $prefixKey.$key : $prefixKey;

            $this->getOpenGraph()->render([
                'property' => $property,
                'content' => $value,
            ]);
        }
    }

    abstract public function render();
}
