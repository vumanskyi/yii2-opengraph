<?php

namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\Exceptions\OpenGraphException;
use umanskyi31\opengraph\OpenGraphConfiguration;
use umanskyi31\opengraph\Tags\Video;

class VideoTest extends TestCase
{
    protected OpenGraphConfiguration $opengraph;

    protected function setUp(): void
    {
        parent::setUp();

        $this->opengraph = new OpenGraphConfiguration();
    }

    public function testSetterUrl()
    {
        $video = new Video($this->opengraph);

        $url = 'https://umanskyi.com/test.mp4';

        $video->setUrl($url);

        $this->assertSame($url, $video->getUrl());
    }

    public function testSetterAttribute()
    {
        $video = new Video($this->opengraph);

        $attr = [
            'type' => 'test',
            'secure_url' => 'https://umanskyi.com/test.mp4',
            'width' => 1800,
            'height' => 1500,
        ];

        $video->setAttributes($attr);

        $this->assertEquals($attr, $video->getAttributes());
    }

    public function testSetterAttributeFailure()
    {
        $video = new Video($this->opengraph);

        $attr = [
            'type' => 'test',
            'secure_url' => 'https://umanskyi.com/test.mp4',
            'not_valid_url' => 'test',
        ];

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $video->setAttributes($attr);
    }

    public function testSetterAdditionalAttribute()
    {
        $video = new Video($this->opengraph);

        $attr = [
            'actor' => 'John Doe',
            'actor:role' => 'Main actor',
            'director' => 'John Doe',
            'writer' => 'John Doe',
            'duration' => 1024,
            'release_date' => '2019-10-10',
            'tag' => 'fantastic',
            'series' => 1,
        ];

        $video->setAdditionalAttributes($attr);

        $this->assertEquals($attr, $video->getAdditionalAttributes());
    }

    public function testSetterAdditionalAttributeFailure()
    {
        $video = new Video($this->opengraph);

        $attr = [
            'actor' => 'John Doe',
            'actor:role' => 'Main actor',
            'director' => 'John Doe',
            'writer' => 'John Doe',
            'duration' => 1024,
            'release_date' => '2019-10-10',
            'tag' => 'fantastic',
            'series' => 1,
            'not_valid' => true,
        ];

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $video->setAttributes($attr);
    }
}
