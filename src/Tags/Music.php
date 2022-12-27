<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Converters\DateTimeToStringConverter;
use umanskyi31\opengraph\Exceptions\OpenGraphException;

class Music extends Tag
{
    protected int $duration;

    protected string $song;

    protected string $creator;

    protected array $musician = [];

    protected array $attrAlbum = [];

    protected array $attrSong = [];

    protected \DateTime $release_date;

    protected array $validAttrAlbum = [
        'album',
        'album:disc',
        'album:track',
    ];

    protected array $validAttrSong = [
        'song:disc',
        'song:track',
    ];

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function getMusician(): array
    {
        return $this->musician;
    }

    public function getSong(): string
    {
        return $this->song;
    }

    public function getAttrAlbum(): array
    {
        return $this->attrAlbum;
    }

    public function getAttrSong(): array
    {
        return $this->attrSong;
    }

    public function setAttrAlbum(array $attrAlbum): Music
    {
        $validAttributes = $this->validAttrAlbum;

        array_map(function ($key) use ($validAttributes) {
            if (empty($key) || ! in_array($key, $validAttributes)) {
                throw new OpenGraphException('Invalid values', 500);
            }
        }, array_keys($attrAlbum), $attrAlbum);

        $this->attrAlbum = $attrAlbum;

        return $this;
    }

    public function getReleaseDate(): \DateTime
    {
        return $this->release_date;
    }

    public function getCreator(): string
    {
        return $this->creator;
    }

    public function setCreator(string $creator): Music
    {
        $this->creator = $creator;

        return $this;
    }

    public function setDuration(int $duration): Music
    {
        $this->duration = $duration;

        return $this;
    }

    public function setMusician(array $musician): Music
    {
        $this->musician = $musician;

        return $this;
    }

    public function setReleaseDate(\DateTime $release_date): Music
    {
        $this->release_date = $release_date;

        return $this;
    }

    /**
     * @param string $song
     * @param array  $attr
     *
     * @return Music
     */
    public function setSong(string $song, array $attr = []): Music
    {
        $this->song = $song;

        if (! empty($attr)) {
            $validAttributes = $this->validAttrSong;

            array_map(function ($key, $value) use ($validAttributes) {
                if (! in_array($key, $validAttributes)) {
                    throw new OpenGraphException('Invalid values', 500);
                }
            }, array_keys($attr), $attr);

            $this->attrSong = $attr;
        }

        return $this;
    }

    public function render()
    {
        $properties = get_object_vars($this);

        foreach ($properties as $key => $property) {
            if (in_array($key, ['attrAlbum', 'attrSong', 'validAttrAlbum', 'validAttrSong', 'musician'])
                || empty($property)) {
                continue;
            }

            $this->getOpenGraph()->render([
                'property' => 'music:'.$key,
                'content' => $property instanceof \DateTimeInterface
                    ? DateTimeToStringConverter::convert($property)
                    : $property,
            ]);
        }

        $this->additionalRender($this->getAttrAlbum(), 'music:', true);
        $this->additionalRender($this->getAttrSong(), 'music:', true);
        $this->additionalRender($this->getMusician(), 'music:musician');
    }
}
