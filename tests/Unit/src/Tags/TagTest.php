<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Tag;

class TagTest extends TestCase
{
//    protected function mockOpenGraphRender(array $data)
//    {
//        $opengraph = $this->getMockBuilder(OpenGraph::class)
//            ->disableOriginalConstructor()
//            ->setMethods(['render'])
//            ->getMock();
//
//        $property = !empty($data['property'])
//            ? 'property="' . $data['property'] . '"'
//            : 'name="' . $data['name'] . '"';
//        $meta = '<meta ' . $property . ' content="' . $data['content'] . '">';
//
//        $opengraph->expects($this->any())
//            ->method('render')
//            ->willReturn($meta);
//    }

    public function testConstruct()
    {
        $opengraph = new OpenGraph();
        $tag = new TagMock($opengraph);

        $this->assertSame($opengraph, $tag->getOpenGraph());
    }

//    public function testAdditionalRender()
//    {
//        $opengraph = $this->getMockBuilder(OpenGraph::class)
//            ->disableOriginalConstructor()
//            ->setMethods(['render'])
//            ->getMock();
//
//        $tag = new TagMock($opengraph);
//
//        $opengraph = $this->getMockBuilder(OpenGraph::class)
//            ->disableOriginalConstructor()
//            ->setMethods(['render'])
//            ->getMock();
//
//        $property = !empty($data['property'])
//            ? 'property="' . $data['property'] . '"'
//            : 'name="' . $data['name'] . '"';
//        $meta = '<meta ' . $property . ' content="' . $data['content'] . '">';
//
//        $opengraph->expects($this->any())
//            ->method('render')
//            ->willReturn($meta);
//
//        $tag->additionalRender([['property' => 'url', 'name' => 'example']], Tag::OG_PREFIX);
//
//
//    }
}

class TagMock extends Tag
{
    public function render()
    {

    }
}