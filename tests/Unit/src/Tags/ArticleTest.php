<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Article;

class ArticleTest extends TestCase
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

    public function testSetAuthor()
    {
        $article = new Article($this->opengraph);

        $authors = ['John Doe', 'Mike Doe'];

        $article->setAuthor($authors);

        $this->assertSame($authors, $article->getAuthor());
    }

    public function testDates()
    {
        $article = new Article($this->opengraph);

        $date = new \DateTime('2011-01-01');

        $article->setExpirationTime($date)->setModifiedTime($date)->setPublishTime($date);

        $this->assertEquals($date, $article->getExpirationTime());
        $this->assertEquals($date, $article->getModifiedTime());
        $this->assertEquals($date, $article->getPublishTime());
    }

    public function testGetTags()
    {
        $article = new Article($this->opengraph);

        $tags = ['test_tag', 'srcond_test_tag'];

        $article->setTag($tags);

        $this->assertSame($tags, $article->getTag());

    }

    public function testSetSection()
    {
        $article = new Article($this->opengraph);

        $section = "TEST_SECTION";

        $article->setSection($section);

        $this->assertSame($section, $article->getSection());
    }

}