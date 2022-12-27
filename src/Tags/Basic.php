<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Tags;

class Basic extends Tag
{
    protected string $title;

    protected string $type;

    protected string $url;

    protected string $site_name;

    protected string $description;

    protected string $determiner;

    protected string $locale;

    protected array $localAlternate = [];

    public function setUrl(string $url): Basic
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setLocale(string $locale): Basic
    {
        $this->locale = $locale;

        return $this;
    }

    public function getSiteName(): string
    {
        return $this->site_name;
    }

    public function setSiteName(string $site_name): Basic
    {
        $this->site_name = $site_name;

        return $this;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setTitle(string $title): Basic
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setType(string $type): Basic
    {
        $this->type = $type;

        return $this;
    }

    public function setLocalAlternate(array $localAlternate): Basic
    {
        $this->localAlternate = $localAlternate;

        return $this;
    }

    public function getLocalAlternate(): array
    {
        return $this->localAlternate;
    }

    public function setDescription(string $description): Basic
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDeterminer(): string
    {
        return $this->determiner;
    }

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
                'property' => self::OG_PREFIX.$key,
                'content'  => $property,
            ]);
        }

        $this->additionalRender($this->getLocalAlternate(), 'locale:alternate');
    }
}
