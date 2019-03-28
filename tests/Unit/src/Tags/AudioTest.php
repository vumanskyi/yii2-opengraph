<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Audio;

class AudioTest extends TestCase
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
        $audio = new Audio($this->opengraph);

        $url = 'https://umanskyi.com/test.mp3';

        $audio->setUrl($url);

        $this->assertSame($url, $audio->getUrl());

    }

    public function testSetAttribute()
    {
        $audio = new Audio($this->opengraph);

        $attr = [
            'type'       => 'test',
            'secure_url' => 'https://umanskyi.com/test.mp3'
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
        $audio = new Audio($this->opengraph);

        $attr = [
            'type'       => 'test',
            'secure_url' => 'https://umanskyi.com/test.mp3',
            'not_valid_url' => 'test'
        ];

        $audio->setAttributes($attr);

        $this->assertEquals($attr, $audio->getAttributes());
    }

}