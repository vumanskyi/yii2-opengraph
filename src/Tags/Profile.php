<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Exceptions\OpenGraphException;

class Profile extends Tag
{
    protected string $first_name;

    protected string $last_name;

    protected string $username;

    protected string $gender;

    /**
     * @see http://ogp.me/#type_profile
     */
    protected array $validGender = [
        'male',
        'female',
    ];

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setFirstName(string $first_name): Profile
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function setGender(string $gender): Profile
    {
        if (! $this->isValidGender($gender)) {
            throw new OpenGraphException('Invalid values', 500);
        }

        $this->gender = strtolower($gender);

        return $this;
    }

    public function setLastName(string $last_name): Profile
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function setUsername(string $username): Profile
    {
        $this->username = $username;

        return $this;
    }

    protected function isValidGender(string $gender): bool
    {
        return in_array(strtolower($gender), $this->validGender);
    }

    public function render()
    {
        $properties = get_object_vars($this);

        foreach ($properties as $key => $property) {
            if (in_array($key, ['validGender']) || empty($property)) {
                continue;
            }

            $this->getOpenGraph()->render([
                'name' => 'profile:' . $key,
                'content' => $property,
            ]);
        }
    }
}
