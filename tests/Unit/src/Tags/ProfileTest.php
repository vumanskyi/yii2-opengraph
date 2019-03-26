<?php
namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\OpenGraph;
use umanskyi31\opengraph\Tags\Profile;

class ProfileTest extends TestCase
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

    public function testGettersAndSetters()
    {
        $profile = new Profile($this->opengraph);

        $firstName = 'John';
        $lastName = 'Doe';
        $username = 'john_doe';
        $gender = 'Male';

        $profile->setFirstName($firstName)
            ->setLastName($lastName)
            ->setUsername($username)
            ->setGender($gender);

        $this->assertSame($firstName, $profile->getFirstName());
        $this->assertSame($lastName, $profile->getLastName());
        $this->assertSame($username, $profile->getUsername());
        $this->assertSame(strtolower($gender), $profile->getGender());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Invalid values
     * @expectedExceptionCode 500
     */
    public function testSetGenderFailure()
    {
        $profile = new Profile($this->opengraph);

        $profile->setGender('No');
    }
}