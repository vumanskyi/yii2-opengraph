<?php

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Exceptions\OpenGraphException;

class Audio extends Tag
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
        'type',
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
    public function setUrl(string $url): Audio
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
    public function setAttributes(array $attributes): Audio
    {
        $validAttributes = $this->validAttributes;

        array_map(function ($key, $value) use ($validAttributes) {
            if (!in_array($key, $validAttributes)) {
                throw new OpenGraphException('Invalid values', 500);
            }
        }, array_keys($attributes), $attributes);

        $this->attributes = $attributes;

        return $this;
    }

    public function render()
    {
        $this->getOpenGraph()->render([
            'property' => self::OG_PREFIX.'audio',
            'content'  => $this->getUrl(),
        ]);

        $this->additionalRender($this->attributes, 'audio:', true);
    }
}
