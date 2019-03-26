<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\TwitterCard;

class TwitterCardTest extends TestCase
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

    public function testSetSite()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $site = 'https://example.com';

        $twitterCard->setSite($site);

        $this->assertSame($site, $twitterCard->getSite());
    }

    public function testSetCreator()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $creator = 'John Doe';

        $twitterCard->setCreator($creator);

        $this->assertSame($creator, $twitterCard->getCreator());
    }

    /**
     * @dataProvider dataCardProvider
     * @param $card
     */
    public function testSetCardSuccess($card)
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $twitterCard->setCard($card);

        $this->assertSame($card, $twitterCard->getCard());
    }

    /**
     * @return array
     */
    public function dataCardProvider()
    {
        return [
            ['summary'],
            ['summary_large_image'],
            ['app'],
            ['player']
        ];
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid values
     * @expectedExceptionCode 500
     */
    public function testSetCardFailure()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $twitterCard->setCard('test_card');
    }
}