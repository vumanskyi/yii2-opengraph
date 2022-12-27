<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Converters\DateTimeToStringConverter;

class Article extends Tag
{
    /**
     * @var string[]
     */
    protected array $author = [];

    /**
     * @var string
     */
    protected string $section;

    /**
     * @var string[]
     */
    protected array $tag = [];

    protected \DateTime $publish_time;

    protected \DateTime $modified_time;

    protected \DateTime $expiration_time;

    /**
     * @return string[]
     */
    public function getAuthor(): array
    {
        return $this->author;
    }

    public function getExpirationTime(): \DateTime
    {
        return $this->expiration_time;
    }

    public function getModifiedTime(): \DateTime
    {
        return $this->modified_time;
    }

    public function getPublishTime(): \DateTime
    {
        return $this->publish_time;
    }

    public function getSection(): string
    {
        return $this->section;
    }

    /**
     * @return string[]
     */
    public function getTag(): array
    {
        return $this->tag;
    }

    /**
     * @param string[] $tag
     *
     * @return Article
     */
    public function setTag(array $tag): Article
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @param string[] $author
     *
     * @return Article
     */
    public function setAuthor(array $author): Article
    {
        $this->author = $author;

        return $this;
    }

    public function setExpirationTime(\DateTime $expiration_time): Article
    {
        $this->expiration_time = $expiration_time;

        return $this;
    }

    public function setModifiedTime(\DateTime $modified_time): Article
    {
        $this->modified_time = $modified_time;

        return $this;
    }

    public function setPublishTime(\DateTime $publish_time): Article
    {
        $this->publish_time = $publish_time;

        return $this;
    }

    /**
     * @param string $section
     *
     * @return Article
     */
    public function setSection(string $section): Article
    {
        $this->section = $section;

        return $this;
    }

    public function render()
    {
        $properties = get_object_vars($this);

        foreach ($properties as $key => $property) {
            if (in_array($key, ['author', 'tag']) || empty($property)) {
                continue;
            }

            $this->getOpenGraph()->render([
                'property' => 'article:'.$key,
                'content'  => $property instanceof \DateTimeInterface
                    ? DateTimeToStringConverter::convert($property)
                    : $property,
            ]);
        }

        $this->additionalRender($this->getAuthor(), 'article:author');
        $this->additionalRender($this->getTag(), 'article:tag');
    }
}
