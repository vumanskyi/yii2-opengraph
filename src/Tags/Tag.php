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


    abstract function render();
}