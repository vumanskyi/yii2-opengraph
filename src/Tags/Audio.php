<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Exceptions\OpenGraphException;

class Audio extends Tag
{
    protected string $url;

    protected array $attributes = [];

    protected array $validAttributes = [
        'secure_url',
        'type',
    ];

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Audio
    {
        $this->url = $url;

        return $this;
    }

    public function setAttributes(array $attributes): Audio
    {
        $validAttributes = $this->validAttributes;

        array_map(function ($key) use ($validAttributes) {
            if (empty($key) || ! in_array($key, $validAttributes)) {
                throw new OpenGraphException('Invalid values', 500);
            }
        }, array_keys($attributes), $attributes);

        $this->attributes = $attributes;

        return $this;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function render()
    {
        $this->getOpenGraph()->render([
            'property' => self::OG_PREFIX . 'audio',
            'content' => $this->getUrl(),
        ]);

        $this->additionalRender($this->attributes, self::OG_PREFIX . 'audio:', true);
    }
}
