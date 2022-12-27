<?php

namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraphConfiguration;
use umanskyi31\opengraph\Tags\Tag;

class TagTest extends TestCase
{
    public function testConstruct()
    {
        $opengraph = new OpenGraphConfiguration();
        $tag = new TagMock($opengraph);

        $this->assertSame($opengraph, $tag->getOpenGraph());
    }
}

class TagMock extends Tag
{
    public function render()
    {
    }
}
