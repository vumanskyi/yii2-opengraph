<?php

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Exceptions\OpenGraphException;

class TwitterCard extends Tag
{
    /**
     * @var string
     */
    const PREFIX = 'twitter:';

    /**
     * @var array
     *
     * @see https://developer.twitter.com/en/docs/tweets/optimize-with-cards/guides/getting-started.html
     */
    private $validCard = [
        'summary',
        'summary_large_image',
        'app',
        'player',
    ];

    /**
     * twitter:title.
     *
     * @var string
     */
    protected $title;

    /**
     * twitter:description.
     *
     * @var string
     */
    protected $description;

    /**
     * twitter:image.
     *
     * @var string
     */
    protected $image;

    /**
     * @var string
     */
    protected $card;

    /**
     * @var string
     */
    protected $site;

    /**
     * @var string
     */
    protected $creator;

    /**
     * @param string $title
     *
     * @return TwitterCard
     */
    public function setTitle(string $title): TwitterCard
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return TwitterCard
     */
    public function setDescription(string $description): TwitterCard
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $image
     *
     * @return TwitterCard
     */
    public function setImage(string $image): TwitterCard
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @param string $site
     *
     * @return TwitterCard
     */
    public function setSite($site): TwitterCard
    {
        $this->site = $site;

        return $this;
    }

    /**
     * @param string $creator
     *
     * @return TwitterCard
     */
    public function setCreator(string $creator): TwitterCard
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * @param string $card
     *
     * @throws OpenGraphException
     *
     * @return TwitterCard
     */
    public function setCard(string $card): TwitterCard
    {
        if (!$this->isValidCart($card)) {
            throw new OpenGraphException('Invalid values', 500);
        }

        $this->card = strtolower($card);

        return $this;
    }

    /**
     * @return string
     */
    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * @return string
     */
    public function getCreator(): string
    {
        return $this->creator;
    }

    /**
     * @return string
     */
    public function getCard(): string
    {
        return $this->card;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $card
     *
     * @return bool
     */
    protected function isValidCart(string $card): bool
    {
        return in_array(strtolower($card), $this->validCard);
    }

    public function render()
    {
        $properties = get_object_vars($this);

        foreach ($properties as $key => $property) {
            if (in_array($key, ['openGraph', 'validCard']) || empty($property)) {
                continue;
            }

            $this->getOpenGraph()->render([
                'name'      => self::PREFIX.$key,
                'content'   => $property,
            ]);
        }
    }
}
