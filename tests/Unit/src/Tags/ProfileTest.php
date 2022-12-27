<?php

namespace umanskyi31\opengraph\test\Unit\src\Tags;

use PHPUnit\Framework\TestCase;
use umanskyi31\opengraph\Exceptions\OpenGraphException;
use umanskyi31\opengraph\OpenGraphConfiguration;
use umanskyi31\opengraph\Tags\Profile;

class ProfileTest extends TestCase
{
    protected OpenGraphConfiguration $opengraph;

    protected function setUp(): void
    {
        parent::setUp();

        $this->opengraph = new OpenGraphConfiguration();
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

    public function testSetterGenderFailure()
    {
        $profile = new Profile($this->opengraph);

        $this->expectException(OpenGraphException::class);
        $this->expectExceptionMessage('Invalid values');
        $this->expectExceptionCode(500);

        $profile->setGender('No');
    }
}
