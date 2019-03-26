<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Basic;

class BasicTest extends TestCase
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

    public function testSettersAndGetters()
    {
        $basic = new Basic($this->opengraph);

        $url = 'https://example.com';
        $altLocacle = ['en_US', 'pl_PL'];
        $locale = 'fr_FR';
        $title = 'Test title';
        $description = 'Test description';
        $type = 'Test_TYPE';
        $siteName = 'example.com';
        $determiner = 'test';

        $basic->setUrl($url)
            ->setLocalAlternate($altLocacle)
            ->setLocale($locale)
            ->setTitle($title)
            ->setDescription($description)
            ->setType($type)
            ->setDeterminer($determiner)
            ->setSiteName($siteName);

        $this->assertSame($url, $basic->getUrl());
        $this->assertSame($altLocacle, $basic->getLocalAlternate());
        $this->assertSame($locale, $basic->getLocale());
        $this->assertSame($title, $basic->getTitle());
        $this->assertSame($description, $basic->getDescription());
        $this->assertSame($type, $basic->getType());
        $this->assertSame($determiner, $basic->getDeterminer());
        $this->assertSame($siteName, $basic->getSiteName());
    }
}