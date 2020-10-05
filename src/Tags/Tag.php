<?php

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Configuration;
use umanskyi31\opengraph\OpenGraph;

abstract class Tag
{
    /**
     * @var string
     */
    const OG_PREFIX = 'og:';

    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * TwitterCard constructor.
     *
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return Configuration
     */
    public function getOpenGraph(): Configuration
    {
        return $this->configuration;
    }

    /**
     * @param array  $data
     * @param string $prefixKey
     * @param bool   $useKey
     */
    public function additionalRender(array $data = [], string $prefixKey, bool $useKey = false)
    {
        foreach ($data as $key => $value) {
            if (empty($value)) {
                continue;
            }

            $property = $useKey ? $prefixKey.$key : $prefixKey;

            $this->getOpenGraph()->render([
                'property'  => $property,
                'content'   => $value,
            ]);
        }
    }

    abstract public function render();
}
