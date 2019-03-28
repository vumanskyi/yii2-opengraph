<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Music;

class MusicTest extends TestCase
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


    public function testSetSong()
    {
        $music = new Music($this->opengraph);

        $url = 'https://umanskyi.com/test';

        $music->setSong($url);

        $this->assertSame($url, $music->getSong());
    }

    public function testSetCreator()
    {
        $music = new Music($this->opengraph);

        $url = 'John Doe';

        $music->setCreator($url);

        $this->assertSame($url, $music->getCreator());

    }

    public function testSetAttributeAlbum()
    {
        $music = new Music($this->opengraph);

        $attr = [
            'album'         => 'Test Album',
            'album:disc'    => "Second",
            'album:track'   => 'second',
        ];

        $music->setAttrAlbum($attr);

        $this->assertEquals($attr, $music->getAttrAlbum());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid values
     * @expectedExceptionCode 500
     */
    public function testSetAttributeAlbumFailure()
    {
        $music = new Music($this->opengraph);

        $attr = [
            'album'         => 'Test Album',
            'album:disc'    => 'Second',
            'album:track'   => 'second',
            'album:not_valid' => 'test'
        ];

        $music->setAttrAlbum($attr);

        $this->assertEquals($attr, $music->getAttrAlbum());
    }

    public function testSetAttributeSong()
    {
        $music = new Music($this->opengraph);

        $attr = [
            'song:disc'    => 'Second',
            'song:track'   => 'second',
        ];

        $url = 'https://umanskyi.com/test';
        $music->setSong($url, $attr);

        $this->assertEquals($url, $music->getSong());
        $this->assertEquals($attr, $music->getAttrSong());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid values
     * @expectedExceptionCode 500
     */
    public function testSetAttributeSongFailure()
    {
        $music = new Music($this->opengraph);

        $attr = [
            'song:disc'    => 'Second',
            'song:track'   => 'second',
            'song:not_valid' => 'test'
        ];

        $url = 'https://umanskyi.com/test';
        $music->setSong($url, $attr);
    }

    public function testReleaseDate()
    {
        $music = new Music($this->opengraph);

        $date = new \DateTime('2011-01-01');

        $music->setReleaseDate($date);

        $this->assertEquals($date, $music->getReleaseDate());
    }

    public function testDuration()
    {
        $music = new Music($this->opengraph);

        $duration = 105;

        $music->setDuration($duration);

        $this->assertSame($duration, $music->getDuration());
    }

    public function testAuthor()
    {
        $music = new Music($this->opengraph);

        $authors = ['John Doe', 'Mike Doe'];

        $music->setMusician($authors);

        $this->assertSame($authors, $music->getMusician());
    }
}