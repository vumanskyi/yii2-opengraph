<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Book;

class BookTest extends TestCase
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

    public function testAuthor()
    {
        $book = new Book($this->opengraph);

        $authors = ['John Doe', 'Mike Doe'];

        $book->setAuthor($authors);

        $this->assertSame($authors, $book->getAuthor());
    }

    public function testReleaseDate()
    {
        $book = new Book($this->opengraph);

        $date = new \DateTime('2011-01-01');

        $book->setReleaseDate($date);

        $this->assertEquals($date, $book->getReleaseDate());
    }

    public function testTag()
    {
        $book = new Book($this->opengraph);

        $tags = ['Avatar', 'Game'];

        $book->setTag($tags);

        $this->assertSame($tags, $book->getTag());
    }

    public function testIsbn()
    {
        $book = new Book($this->opengraph);

        $isbn = '9305581bn34';

        $book->setIsbn($isbn);

        $this->assertSame($isbn, $book->getIsbn());
    }
}