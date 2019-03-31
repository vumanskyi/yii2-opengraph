<?php

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Exceptions\OpenGraphException;

class Video extends Tag
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var array
     */
    protected $validAttributes = [
        'secure_url',
        'width',
        'height',
        'type',
    ];

    /**
     * @var array
     */
    protected $additionalAttributes = [];

    /**
     * @var array
     */
    protected $validAdditionalAttr = [
        'actor',
        'actor:role',
        'director',
        'writer',
        'duration',
        'release_date',
        'tag',
        'series',
    ];

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return Video
     */
    public function setUrl(string $url): Video
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param array $attributes
     *
     * @throws OpenGraphException
     *
     * @return Image
     */
    public function setAttributes(array $attributes): Video
    {
        $validAttributes = $this->validAttributes;

        array_map(function ($key, $value) use ($validAttributes) {
            if (empty($key) || !in_array($key, $validAttributes)) {
                throw new OpenGraphException('Invalid values', 500);
            }
        }, array_keys($attributes), $attributes);

        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @param array $attributes
     *
     * @return Video
     */
    public function setAdditionalAttributes(array $attributes): Video
    {
        $validAttributes = $this->validAdditionalAttr;

        array_map(function ($key, $value) use ($validAttributes) {
            if (empty($key) || !in_array($key, $validAttributes)) {
                throw new OpenGraphException('Invalid values', 500);
            }
        }, array_keys($attributes), $attributes);

        $this->additionalAttributes = $attributes;

        return $this;
    }

    /**
     * @return array
     */
    public function getAdditionalAttributes(): array
    {
        return $this->additionalAttributes;
    }

    /**
     * @return array
     */
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
