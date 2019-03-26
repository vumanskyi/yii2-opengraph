<?php

namespace umanskyi31\opengraph\Tags;

class Basic extends Tag
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $site_name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $determiner;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var array
     */
    protected $localAlternate = [];

    /**
     * @param string $url
     *
     * @return Basic
     */
    public function setUrl(string $url): Basic
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $locale
     *
     * @return Basic
     */
    public function setLocale(string $locale): Basic
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string
     */
    public function getSiteName(): string
    {
        return $this->site_name;
    }

    /**
     * @param string $site_name
     *
     * @return Basic
     */
    public function setSiteName(string $site_name): Basic
    {
        $this->site_name = $site_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $title
     *
     * @return Basic
     */
    public function setTitle(string $title): Basic
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $type
     *
     * @return Basic
     */
    public function setType(string $type): Basic
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param array $localAlternate
     *
     * @return Basic
     */
    public function setLocalAlternate(array $localAlternate): Basic
    {
        $this->localAlternate = $localAlternate;

        return $this;
    }

    /**
     * @return array
     */
    public function getLocalAlternate(): array
    {
        return $this->localAlternate;
    }

    /**
     * @param string $description
     *
     * @return Basic
     */
    public function setDescription(string $description): Basic
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getDeterminer(): string
    {
        return $this->determiner;
    }

    /**
     * @param string $determiner
     *
     * @return Basic
     */
    public function setDeterminer(string $determiner): Basic
    {
        $this->determiner = $determiner;

        return $this;
    }

    public function render()
    {
        $properties = get_object_vars($this);

        foreach ($properties as $key => $property) {
            if (in_array($key, ['localAlternate']) || empty($property)) {
                continue;
            }

            $this->getOpenGraph()->render([
                'property'      => self::OG_PREFIX.$key,
                'content'       => $property,
            ]);
        }

        $this->additionalRender($this->getLocalAlternate(), 'locale:alternate');
    }
}
