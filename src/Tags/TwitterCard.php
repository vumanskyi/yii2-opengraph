<?php

declare(strict_types=1);

namespace umanskyi31\opengraph\Tags;

use umanskyi31\opengraph\Exceptions\OpenGraphException;

class TwitterCard extends Tag
{
    public const PREFIX = 'twitter:';

    /**
     * twitter:title.
     */
    protected string $title;

    /**
     * twitter:description.
     */
    protected string $description;

    /**
     * twitter:image.
     */
    protected string $image;

    protected string $card;

    protected string $site;

    protected string $creator;

    /**
     * @see https://developer.twitter.com/en/docs/tweets/optimize-with-cards/guides/getting-started.html
     */
    private array $validCard = [
        'summary',
        'summary_large_image',
        'app',
        'player',
    ];

    public function setTitle(string $title): TwitterCard
    {
        $this->title = $title;

        return $this;
    }

    public function setDescription(string $description): TwitterCard
    {
        $this->description = $description;

        return $this;
    }

    public function setImage(string $image): TwitterCard
    {
        $this->image = $image;

        return $this;
    }

    public function setSite($site): TwitterCard
    {
        $this->site = $site;

        return $this;
    }

    public function setCreator(string $creator): TwitterCard
    {
        $this->creator = $creator;

        return $this;
    }

    public function setCard(string $card): TwitterCard
    {
        if (! $this->isValidCart($card)) {
            throw new OpenGraphException('Invalid values', 500);
        }

        $this->card = strtolower($card);

        return $this;
    }

    public function getSite(): string
    {
        return $this->site;
    }

    public function getCreator(): string
    {
        return $this->creator;
    }

    public function getCard(): string
    {
        return $this->card;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

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
                'name' => self::PREFIX.$key,
                'content' => $property,
            ]);
        }
    }
}
