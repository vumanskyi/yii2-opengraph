<?php
namespace umanskyi31\opengraph\test\Unit\src;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Article;
use umanskyi31\opengraph\Tags\Audio;
use umanskyi31\opengraph\Tags\Basic;
use umanskyi31\opengraph\Tags\Book;
use umanskyi31\opengraph\Tags\Image;
use umanskyi31\opengraph\Tags\Music;
use umanskyi31\opengraph\Tags\Profile;
use umanskyi31\opengraph\Tags\TwitterCard;
use umanskyi31\opengraph\Tags\Video;

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

    public function testCheckGetters()
    {
        $this->assertInstanceOf(OpenGraph::class, $this->opengraph);
        $this->assertInstanceOf(Basic::class, $this->opengraph->getBasic());
        $this->assertInstanceOf(Image::class, $this->opengraph->getImage());
        $this->assertInstanceOf(Music::class, $this->opengraph->getMusic());
        $this->assertInstanceOf(Video::class, $this->opengraph->getVideo());
        $this->assertInstanceOf(Audio::class, $this->opengraph->getAudio());
        $this->assertInstanceOf(Article::class, $this->opengraph->getArticle());
        $this->assertInstanceOf(Book::class, $this->opengraph->getBook());
        $this->assertInstanceOf(Profile::class, $this->opengraph->getProfile());
        $this->assertInstanceOf(TwitterCard::class, $this->opengraph->useTwitterCard());
    }
}