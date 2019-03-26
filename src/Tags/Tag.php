<?php

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\OpenGraph;

abstract class Tag
{
    /**
     * @var string
     */
    const OG_PREFIX = 'og:';

    /**
     * @var OpenGraph
     */
    private $openGraph;

    /**
     * TwitterCard constructor.
     *
     * @param OpenGraph $openGraph
     */
    public function __construct(OpenGraph $openGraph)
    {
        $this->openGraph = $openGraph;
    }

    /**
     * @return OpenGraph
     */
    public function getOpenGraph(): OpenGraph
    {
        return $this->openGraph;
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
