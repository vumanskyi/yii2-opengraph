<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\Exceptions\OpenGraphException;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\OpenGraphConfiguration;
use umanskyi31\opengraph\Tags\Image;

class ImageTest extends TestCase
{
    /**
     * @var OpenGraph
     */
    protected $opengraph;

    protected function setUp(): void
    {
        parent::setUp();

        $this->opengraph = new OpenGraphConfiguration();
    }

    /**
     * @test
     */
    public function setterUrl()
    {
        $audio = new Image($this->opengraph);

        $url = 'https://umanskyi.com/test.png';

        $audio->setUrl($url);

        $this->assertSame($url, $audio->getUrl());

    }

    /**
     * @test
     */
    public function setterAttribute()
    {
        $audio = new Image($this->opengraph);

        $attr = [
            'width'      => 10,
            'height'     => 10,
            'type'       => 'jpg',
            'alt'        => 'Test',
            'secure_url' => 'https://umanskyi.com/test.png'
        ];

        $audio->setAttributes($attr);

        $this->assertEquals($attr, $audio->getAttributes());
    }

    /**
     * @test
     */
    public function setterAttributeFailure()
    {
        $audio = new Image($this->opengraph);

        $attr = [
            'type'       => 'jpg',
            'secure_url' => 'https://umanskyi.com/test.jpg',
            'not_valid_url' => 'test'
        ];

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $audio->setAttributes($attr);

        $this->assertEquals($attr, $audio->getAttributes());
    }
}
