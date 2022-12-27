<?php

namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\Exceptions\OpenGraphException;
use umanskyi31\opengraph\OpenGraphConfiguration;
use umanskyi31\opengraph\Tags\TwitterCard;

class TwitterCardTest extends TestCase
{
    protected OpenGraphConfiguration $opengraph;

    protected function setUp(): void
    {
        parent::setUp();

        $this->opengraph = new OpenGraphConfiguration();
    }

    public function testSetterSite()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $site = 'https://example.com';

        $twitterCard->setSite($site);

        $this->assertSame($site, $twitterCard->getSite());
    }

    public function testSetterCreator()
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
    public function testSetterCardSuccess($card)
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
            ['player'],
        ];
    }

    public function testSetterCardFailure()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $twitterCard->setCard('test_card');
    }

    public function testSetterTitle()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $title = 'test title';

        $twitterCard->setTitle($title);

        $this->assertEquals($title, $twitterCard->getTitle());
    }

    public function testSetterDescription()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $description = 'test description';

        $twitterCard->setDescription($description);

        $this->assertEquals($description, $twitterCard->getDescription());
    }

    public function testSetterImage()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $imagePath = 'https://umanskyi.com/image.png';

        $twitterCard->setImage($imagePath);

        $this->assertEquals($imagePath, $twitterCard->getImage());
    }
}
