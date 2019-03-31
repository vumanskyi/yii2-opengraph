<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Image;

class ImageTest extends TestCase
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
        $audio = new Image($this->opengraph);

        $url = 'https://umanskyi.com/test.png';

        $audio->setUrl($url);

        $this->assertSame($url, $audio->getUrl());

    }

    public function testSetAttribute()
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
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid values
     * @expectedExceptionCode 500
     */
    public function testSetAttributeFailure()
    {
        $audio = new Image($this->opengraph);

        $attr = [
            'type'       => 'jpg',
            'secure_url' => 'https://umanskyi.com/test.jpg',
            'not_valid_url' => 'test'
        ];

        $audio->setAttributes($attr);

        $this->assertEquals($attr, $audio->getAttributes());
    }
}