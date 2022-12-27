<?php

namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\Exceptions\OpenGraphException;
use umanskyi31\opengraph\OpenGraphConfiguration;
use umanskyi31\opengraph\Tags\Music;

class MusicTest extends TestCase
{
    protected OpenGraphConfiguration $opengraph;

    protected function setUp(): void
    {
        parent::setUp();

        $this->opengraph = new OpenGraphConfiguration();
    }

    public function testSetterSong()
    {
        $music = new Music($this->opengraph);

        $url = 'https://umanskyi.com/test';

        $music->setSong($url);

        $this->assertSame($url, $music->getSong());
    }

    public function testSetterCreator()
    {
        $music = new Music($this->opengraph);

        $url = 'John Doe';

        $music->setCreator($url);

        $this->assertSame($url, $music->getCreator());
    }

    public function testSetterAttributeAlbum()
    {
        $music = new Music($this->opengraph);

        $attr = [
            'album' => 'Test Album',
            'album:disc' => "Second",
            'album:track' => 'second',
        ];

        $music->setAttrAlbum($attr);

        $this->assertEquals($attr, $music->getAttrAlbum());
    }

    public function testSetterAttributeAlbumFailure()
    {
        $music = new Music($this->opengraph);

        $attr = [
            'album' => 'Test Album',
            'album:disc' => 'Second',
            'album:track' => 'second',
            'album:not_valid' => 'test',
        ];

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $music->setAttrAlbum($attr);
    }

    public function testSetterAttributeSong()
    {
        $music = new Music($this->opengraph);

        $attr = [
            'song:disc' => 'Second',
            'song:track' => 'second',
        ];

        $url = 'https://umanskyi.com/test';
        $music->setSong($url, $attr);

        $this->assertEquals($url, $music->getSong());
        $this->assertEquals($attr, $music->getAttrSong());
    }

    public function testSetterAttributeSongFailure()
    {
        $music = new Music($this->opengraph);

        $attr = [
            'song:disc' => 'Second',
            'song:track' => 'second',
            'song:not_valid' => 'test',
        ];

        $url = 'https://umanskyi.com/test';

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $music->setSong($url, $attr);
    }

    public function testSetterReleaseDate()
    {
        $music = new Music($this->opengraph);

        $date = new \DateTime('2011-01-01');

        $music->setReleaseDate($date);

        $this->assertEquals($date, $music->getReleaseDate());
    }

    public function testSetterDuration()
    {
        $music = new Music($this->opengraph);

        $duration = 105;

        $music->setDuration($duration);

        $this->assertSame($duration, $music->getDuration());
    }

    public function testSetterAuthor()
    {
        $music = new Music($this->opengraph);

        $authors = ['John Doe', 'Mike Doe'];

        $music->setMusician($authors);

        $this->assertSame($authors, $music->getMusician());
    }
}
