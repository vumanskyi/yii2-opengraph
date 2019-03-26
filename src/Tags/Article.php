<?php

namespace umanskyi31\opengraph\Tags;

class Article extends Tag
{
    /**
     * @var \DateTime
     */
    protected $publish_time;

    /**
     * @var \DateTime
     */
    protected $modified_time;

    /**
     * @var \DateTime
     */
    protected $expiration_time;

    /**
     * @var string[]
     */
    protected $author = [];

    /**
     * @var string
     */
    protected $section;

    /**
     * @var string[]
     */
    protected $tag = [];

    /**
     * @return string[]
     */
    public function getAuthor(): array
    {
        return $this->author;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationTime(): \DateTime
    {
        return new \DateTime($this->expiration_time);
    }

    /**
     * @return \DateTime
     */
    public function getModifiedTime(): \DateTime
    {
        return new \DateTime($this->modified_time);
    }

    /**
     * @return \DateTime
     */
    public function getPublishTime(): \DateTime
    {
        return new \DateTime($this->publish_time);
    }

    /**
     * @return string
     */
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

    /**
     * @param \DateTime $expiration_time
     *
     * @return Article
     */
    public function setExpirationTime(\DateTime $expiration_time): Article
    {
        $this->expiration_time = $expiration_time->format('Y-m-d');

        return $this;
    }

    /**
     * @param \DateTime $modified_time
     *
     * @return Article
     */
    public function setModifiedTime(\DateTime $modified_time): Article
    {
        $this->modified_time = $modified_time->format('Y-m-d');

        return $this;
    }

    /**
     * @param \DateTime $publish_time
     *
     * @return Article
     */
    public function setPublishTime(\DateTime $publish_time): Article
    {
        $this->publish_time = $publish_time->format('Y-m-d');

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
                'property'  => 'article:'.$key,
                'content'   => $property,
            ]);
        }

        $this->additionalRender($this->getAuthor(), 'article:author');
        $this->additionalRender($this->getTag(), 'article:tag');
    }
}
