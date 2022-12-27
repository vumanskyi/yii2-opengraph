<?php

namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraphConfiguration;
use umanskyi31\opengraph\Tags\Article;

class ArticleTest extends TestCase
{
    protected OpenGraphConfiguration $opengraph;

    protected function setUp(): void
    {
        parent::setUp();

        $this->opengraph = new OpenGraphConfiguration();
    }

    public function testSetterAuthor()
    {
        $article = new Article($this->opengraph);

        $authors = ['John Doe', 'Mike Doe'];

        $article->setAuthor($authors);

        $this->assertSame($authors, $article->getAuthor());
    }

    public function testSetterDates()
    {
        $article = new Article($this->opengraph);

        $date = new \DateTime('2011-01-01');

        $article->setExpirationTime($date)
            ->setModifiedTime($date)
            ->setPublishTime($date);

        $this->assertEquals($date, $article->getExpirationTime());
        $this->assertEquals($date, $article->getModifiedTime());
        $this->assertEquals($date, $article->getPublishTime());
    }

    public function testSetterTags()
    {
        $article = new Article($this->opengraph);

        $tags = ['test_tag', 'srcond_test_tag'];

        $article->setTag($tags);

        $this->assertSame($tags, $article->getTag());
    }

    public function testSetterSection()
    {
        $article = new Article($this->opengraph);

        $section = "TEST_SECTION";

        $article->setSection($section);

        $this->assertSame($section, $article->getSection());
    }
}
