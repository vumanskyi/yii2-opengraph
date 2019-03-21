<?php
namespace umanskyi31\opengraph;

use umanskyi31\opengraph\Tags\Audio;
use umanskyi31\opengraph\Tags\Image;
use umanskyi31\opengraph\Tags\TwitterCard;
use umanskyi31\opengraph\Tags\Video;
use Yii;

class OpenGraph
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
    protected $localAlternate;

    /**
     * @var Image
     */
    protected $image;

    /**
     * @var Video
     */
    protected $video;

    /**
     * @var Audio
     */
    protected $audio;

    /**
     * @var TwitterCard
     */
    protected $twitterCard;

    /**
     * @param OpenGraph $url
     *
     * @return OpenGraph
     */
    public function setUrl(OpenGraph $url): OpenGraph
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): OpenGraph
    {
        return $this->url;
    }

    /**
     * @param string $locale
     *
     * @return OpenGraph
     */
    public function setLocale(string $locale): OpenGraph
    {
        $this->locale = $locale;

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
     * @return OpenGraph
     */
    public function setTitle(string $title): OpenGraph
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
     * @return OpenGraph
     */
    public function setType(string $type): OpenGraph
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param array $localAlternate
     *
     * @return OpenGraph
     */
    public function setLocalAlternate(array $localAlternate): OpenGraph
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
     * @return OpenGraph
     */
    public function setDescription(string $description): OpenGraph
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
     * @return OpenGraph
     */
    public function setDeterminer(string $determiner): OpenGraph
    {
        $this->determiner = $determiner;

        return $this;
    }

    /**
     * @return Image
     */
    public function getImage()
    {
        $this->image = new Image($this);

        return $this->image;
    }

    /**
     * @return Video
     */
    public function getVideo()
    {
        $this->video = new Video($this);

        return $this->video;
    }

    public function getAudio()
    {
        $this->audio = new Audio($this);

        return $this->audio;
    }

    /**
     * @return TwitterCard
     */
    public function useTwitterCard()
    {
        $this->twitterCard = new TwitterCard($this);

        return $this->twitterCard;
    }

    /**
     * @param array $data
     */
    public function render(array $data)
    {
        Yii::$app->view->registerMetaTag($data);
    }
}