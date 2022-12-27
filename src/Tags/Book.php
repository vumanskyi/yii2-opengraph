<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Converters\DateTimeToStringConverter;

class Book extends Tag
{
    /**
     * @var string
     */
    protected string $isbn;

    /**
     * @var string[]
     */
    protected array $tag = [];

    /**
     * @var string[]
     */
    protected array $author = [];

    protected \DateTime $release_date;

    /**
     * @param string[] $author
     *
     * @return Book
     */
    public function setAuthor(array $author): Book
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAuthor(): array
    {
        return $this->author;
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
     * @return Book
     */
    public function setTag(array $tag): Book
    {
        $this->tag = $tag;

        return $this;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): Book
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getReleaseDate(): \DateTime
    {
        return $this->release_date;
    }

    public function setReleaseDate(\DateTime $release_date): Book
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function render()
    {
        $this->additionalRender($this->getAuthor(), 'book:author');

        $properties = get_object_vars($this);

        foreach ($properties as $key => $property) {
            if (in_array($key, ['author', 'tag']) || empty($property)) {
                continue;
            }

            $this->getOpenGraph()->render([
                'property' => 'book:'.$key,
                'content'  => $property instanceof \DateTimeInterface
                    ? DateTimeToStringConverter::convert($property)
                    : $property,
            ]);
        }

        $this->additionalRender($this->getTag(), 'book:tag');
    }
}
