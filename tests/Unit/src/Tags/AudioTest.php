<?php

namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\Exceptions\OpenGraphException;
use umanskyi31\opengraph\OpenGraphConfiguration;
use umanskyi31\opengraph\Tags\Audio;

class AudioTest extends TestCase
{
    protected OpenGraphConfiguration $opengraph;

    protected function setUp(): void
    {
        parent::setUp();

        $this->opengraph = new OpenGraphConfiguration();
    }

    public function testSetterUrl()
    {
        $audio = new Audio($this->opengraph);

        $url = 'https://umanskyi.com/test.mp3';

        $audio->setUrl($url);

        $this->assertSame($url, $audio->getUrl());
    }

    public function testSetterAttribute()
    {
        $audio = new Audio($this->opengraph);

        $attr = [
            'type' => 'test',
            'secure_url' => 'https://umanskyi.com/test.mp3',
        ];

        $audio->setAttributes($attr);

        $this->assertEquals($attr, $audio->getAttributes());
    }

    public function testSetterAttributeFailure()
    {
        $audio = new Audio($this->opengraph);

        $attr = [
            'type' => 'test',
            'secure_url' => 'https://umanskyi.com/test.mp3',
            'not_valid_url' => 'test',
        ];

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $audio->setAttributes($attr);

        $this->assertEquals($attr, $audio->getAttributes());
    }
}
