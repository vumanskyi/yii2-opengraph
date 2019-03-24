<?php
namespace umanskyi31\opengraph\test\Unit\src;

use Codeception\PHPUnit\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Basic;

class OpenGraphTest extends TestCase
{
    /**
     * @var OpenGraph
     */
    protected $opengraph;

    protected function setUp()
    {
        parent::setUp();

        $this->opengraph = new OpenGraph();
    }

    public function testGetBasic()
    {
        $this->assertInstanceOf(OpenGraph::class, $this->opengraph);
        $this->assertInstanceOf(Basic::class, $this->opengraph->getBasic());
    }
}