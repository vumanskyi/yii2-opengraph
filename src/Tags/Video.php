<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Exceptions\OpenGraphException;

class Video extends Tag
{
    protected string $url;

    protected array $attributes = [];

    protected array $validAttributes = [
        'secure_url',
        'width',
        'height',
        'type',
    ];

    protected array $additionalAttributes = [];

    protected array $validAdditionalAttr = [
        'actor',
        'actor:role',
        'director',
        'writer',
        'duration',
        'release_date',
        'tag',
        'series',
    ];

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Video
    {
        $this->url = $url;

        return $this;
    }

    public function setAttributes(array $attributes): Video
    {
        $validAttributes = $this->validAttributes;

        array_map(function ($key) use ($validAttributes) {
            if (empty($key) || !in_array($key, $validAttributes)) {
                throw new OpenGraphException('Invalid values', 500);
            }
        }, array_keys($attributes), $attributes);

        $this->attributes = $attributes;

        return $this;
    }

    public function setAdditionalAttributes(array $attributes): Video
    {
        $validAttributes = $this->validAdditionalAttr;

        array_map(function ($key) use ($validAttributes) {
            if (empty($key) || !in_array($key, $validAttributes)) {
                throw new OpenGraphException('Invalid values', 500);
            }
        }, array_keys($attributes), $attributes);

        $this->additionalAttributes = $attributes;

        return $this;
    }

    public function getAdditionalAttributes(): array
    {
        return $this->additionalAttributes;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function render()
    {
        $this->getOpenGraph()->render([
            'property' => self::OG_PREFIX.'video',
            'content'  => $this->getUrl(),
        ]);

        $this->additionalRender($this->attributes, self::OG_PREFIX.'video:', true);
        $this->additionalRender($this->additionalAttributes, 'video:', true);
    }
}
