<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\Exceptions\OpenGraphException;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\TwitterCard;

class TwitterCardTest extends TestCase
{
    /**
     * @var OpenGraph
     */
    protected $opengraph;

    protected function setUp(): void
    {
        parent::setUp();

        $this->opengraph = new OpenGraph();
    }

    /**
     * @test
     */
    public function setterSite()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $site = 'https://example.com';

        $twitterCard->setSite($site);

        $this->assertSame($site, $twitterCard->getSite());
    }

    /**
     * @test
     */
    public function setterCreator()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $creator = 'John Doe';

        $twitterCard->setCreator($creator);

        $this->assertSame($creator, $twitterCard->getCreator());
    }

    /**
     * @test
     * @dataProvider dataCardProvider
     * @param $card
     */
    public function setterCardSuccess($card)
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
     * @test
     */
    public function setterCardFailure()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $twitterCard->setCard('test_card');
    }

    /**
     * @test
     */
    public function setterTitle()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $title = 'test title';

        $twitterCard->setTitle($title);

        $this->assertEquals($title, $twitterCard->getTitle());
    }

    /**
     * @test
     */
    public function setterDescription()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $description = 'test description';

        $twitterCard->setDescription($description);

        $this->assertEquals($description, $twitterCard->getDescription());
    }

    /**
     * @test
     */
    public function setterImage()
    {
        $twitterCard = new TwitterCard($this->opengraph);

        $imagePath = 'https://umanskyi.com/image.png';

        $twitterCard->setImage($imagePath);

        $this->assertEquals($imagePath, $twitterCard->getImage());
    }
}
