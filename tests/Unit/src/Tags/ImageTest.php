<?php

namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\Exceptions\OpenGraphException;
use umanskyi31\opengraph\OpenGraphConfiguration;
use umanskyi31\opengraph\Tags\Image;

class ImageTest extends TestCase
{
    protected OpenGraphConfiguration $opengraph;

    protected function setUp(): void
    {
        parent::setUp();

        $this->opengraph = new OpenGraphConfiguration();
    }

    public function testSetterUrl()
    {
        $audio = new Image($this->opengraph);

        $url = 'https://umanskyi.com/test.png';

        $audio->setUrl($url);

        $this->assertSame($url, $audio->getUrl());
    }

    public function testSetterAttribute()
    {
        $audio = new Image($this->opengraph);

        $attr = [
            'width' => 10,
            'height' => 10,
            'type' => 'jpg',
            'alt' => 'Test',
            'secure_url' => 'https://umanskyi.com/test.png',
        ];

        $audio->setAttributes($attr);

        $this->assertEquals($attr, $audio->getAttributes());
    }

    public function testSetterAttributeFailure()
    {
        $audio = new Image($this->opengraph);

        $attr = [
            'type' => 'jpg',
            'secure_url' => 'https://umanskyi.com/test.jpg',
            'not_valid_url' => 'test',
        ];

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $audio->setAttributes($attr);

        $this->assertEquals($attr, $audio->getAttributes());
    }
}
