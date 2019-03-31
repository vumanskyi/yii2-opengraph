<?php

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Exceptions\OpenGraphException;

class Music extends Tag
{
    /**
     * @var string
     */
    protected $song;

    /**
     * @var array
     */
    protected $attrAlbum = [];

    /**
     * @var array
     */
    protected $attrSong = [];

    /**
     * @var array
     */
    protected $validAttrAlbum = [
        'album',
        'album:disc',
        'album:track',
    ];

    /**
     * @var array
     */
    protected $validAttrSong = [
        'song:disc',
        'song:track',
    ];

    /**
     * @var int
     */
    protected $duration;

    /**
     * @var array
     */
    protected $musician = [];

    /**
     * @var \DateTime
     */
    protected $release_date;

    /**
     * @var string
     */
    protected $creator;

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @return array
     */
    public function getMusician(): array
    {
        return $this->musician;
    }

    /**
     * @return string
     */
    public function getSong(): string
    {
        return $this->song;
    }

    /**
     * @return array
     */
    public function getAttrAlbum(): array
    {
        return $this->attrAlbum;
    }

    /**
     * @return array
     */
    public function getAttrSong(): array
    {
        return $this->attrSong;
    }

    /**
     * @param array $attrAlbum
     *
     * @return Music
     */
    public function setAttrAlbum(array $attrAlbum): Music
    {
        $validAttributes = $this->validAttrAlbum;

        array_map(function ($key, $value) use ($validAttributes) {
            if (empty($key) || !in_array($key, $validAttributes)) {
                throw new OpenGraphException('Invalid values', 500);
            }
        }, array_keys($attrAlbum), $attrAlbum);

        $this->attrAlbum = $attrAlbum;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getReleaseDate(): \DateTime
    {
        return new \DateTime($this->release_date);
    }

    /**
     * @return string
     */
    public function getCreator(): string
    {
        return $this->creator;
    }

    /**
     * @param string $creator
     *
     * @return Music
     */
    public function setCreator(string $creator): Music
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * @param int $duration
     *
     * @return Music
     */
    public function setDuration(int $duration): Music
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @param array $musician
     *
     * @return Music
     */
    public function setMusician(array $musician): Music
    {
        $this->musician = $musician;

        return $this;
    }

    /**
     * @param \DateTime $release_date
     *
     * @return Music
     */
    public function setReleaseDate(\DateTime $release_date): Music
    {
        $this->release_date = $release_date->format('Y-m-d');

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

        if (!empty($attr)) {
            $validAttributes = $this->validAttrSong;

            array_map(function ($key, $value) use ($validAttributes) {
                if (!in_array($key, $validAttributes)) {
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
                'property'  => 'music:'.$key,
                'content'   => $property,
            ]);
        }

        $this->additionalRender($this->getAttrAlbum(), 'music:', true);
        $this->additionalRender($this->getAttrSong(), 'music:', true);
        $this->additionalRender($this->getMusician(), 'music:musician');
    }
}
