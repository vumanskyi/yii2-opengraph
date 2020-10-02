<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\Exceptions\OpenGraphException;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Music;

class MusicTest extends TestCase
{
    /**
     * @var OpenGraph
     */
    protected $opengraph;

    protected function setUp(): void
    {
        parent::setUp();

        $this->opengraph = new OpenGraph();
    }

    /**
     * @test
     */
    public function setterSong()
    {
        $music = new Music($this->opengraph);

        $url = 'https://umanskyi.com/test';

        $music->setSong($url);

        $this->assertSame($url, $music->getSong());
    }

    /**
     * @test
     */
    public function setterCreator()
    {
        $music = new Music($this->opengraph);

        $url = 'John Doe';

        $music->setCreator($url);

        $this->assertSame($url, $music->getCreator());

    }

    /**
     * @test
     */
    public function setterAttributeAlbum()
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
     * @test
     */
    public function setterAttributeAlbumFailure()
    {
        $music = new Music($this->opengraph);

        $attr = [
            'album'         => 'Test Album',
            'album:disc'    => 'Second',
            'album:track'   => 'second',
            'album:not_valid' => 'test'
        ];

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $music->setAttrAlbum($attr);
    }

    /**
     * @test
     */
    public function setterAttributeSong()
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
     * @test
     */
    public function setterAttributeSongFailure()
    {
        $music = new Music($this->opengraph);

        $attr = [
            'song:disc'    => 'Second',
            'song:track'   => 'second',
            'song:not_valid' => 'test'
        ];

        $url = 'https://umanskyi.com/test';

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $music->setSong($url, $attr);
    }

    /**
     * @test
     */
    public function setterReleaseDate()
    {
        $music = new Music($this->opengraph);

        $date = new \DateTime('2011-01-01');

        $music->setReleaseDate($date);

        $this->assertEquals($date, $music->getReleaseDate());
    }

    /**
     * @test
     */
    public function setterDuration()
    {
        $music = new Music($this->opengraph);

        $duration = 105;

        $music->setDuration($duration);

        $this->assertSame($duration, $music->getDuration());
    }

    /**
     * @test
     */
    public function setterAuthor()
    {
        $music = new Music($this->opengraph);

        $authors = ['John Doe', 'Mike Doe'];

        $music->setMusician($authors);

        $this->assertSame($authors, $music->getMusician());
    }
}
