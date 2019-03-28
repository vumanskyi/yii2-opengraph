<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Video;

class VideoTest extends TestCase
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

    public function testSetUrl()
    {
        $video = new Video($this->opengraph);

        $url = 'https://umanskyi.com/test.mp4';

        $video->setUrl($url);

        $this->assertSame($url, $video->getUrl());

    }

    public function testSetAttribute()
    {
        $video = new Video($this->opengraph);

        $attr = [
            'type'       => 'test',
            'secure_url' => 'https://umanskyi.com/test.mp4',
            'width'      => 1800,
            'height' => 1500,
        ];

        $video->setAttributes($attr);

        $this->assertEquals($attr, $video->getAttributes());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid values
     * @expectedExceptionCode 500
     */
    public function testSetAttributeFailure()
    {
        $video = new Video($this->opengraph);

        $attr = [
            'type'       => 'test',
            'secure_url' => 'https://umanskyi.com/test.mp4',
            'not_valid_url' => 'test'
        ];

        $video->setAttributes($attr);
    }

    public function testSetAdditionalAttribute()
    {
        $video = new Video($this->opengraph);

        $attr = [
            'actor'         => 'John Doe',
            'actor:role'    => 'Main actor',
            'director'      => 'John Doe',
            'writer'        => 'John Doe',
            'duration'      => 1024,
            'release_date'  => '2019-10-10',
            'tag'           => 'fantastic',
            'series'        => 1,
        ];

        $video->setAdditionalAttributes($attr);

        $this->assertEquals($attr, $video->getAdditionalAttributes());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid values
     * @expectedExceptionCode 500
     */
    public function testSetAdditionalAttributeFailure()
    {
        $video = new Video($this->opengraph);

        $attr = [
            'actor'         => 'John Doe',
            'actor:role'    => 'Main actor',
            'director'      => 'John Doe',
            'writer'        => 'John Doe',
            'duration'      => 1024,
            'release_date'  => '2019-10-10',
            'tag'           => 'fantastic',
            'series'        => 1,
            'not_valid'     => true,
        ];

        $video->setAttributes($attr);
    }
}