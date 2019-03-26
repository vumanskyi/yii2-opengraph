<?php

namespace umanskyi31\opengraph;

use umanskyi31\opengraph\Tags\Article;
use umanskyi31\opengraph\Tags\Audio;
use umanskyi31\opengraph\Tags\Basic;
use umanskyi31\opengraph\Tags\Book;
use umanskyi31\opengraph\Tags\Image;
use umanskyi31\opengraph\Tags\Music;
use umanskyi31\opengraph\Tags\Profile;
use umanskyi31\opengraph\Tags\TwitterCard;
use umanskyi31\opengraph\Tags\Video;
use Yii;

class OpenGraph
{
    /**
     * @var Article
     */
    protected $article;

    /**
     * @var Audio
     */
    protected $audio;

    /**
     * @var Basic
     */
    protected $basic;

    /**
     * @var Book
     */
    protected $book;

    /**
     * @var Image
     */
    protected $image;

    /**
     * @var Music
     */
    protected $music;

    /**
     * @var Profile
     */
    protected $profile;

    /**
     * @var Video
     */
    protected $video;

    /**
     * @var TwitterCard
     */
    protected $twitterCard;

    /**
     * @return Basic
     */
    public function getBasic(): Basic
    {
        $this->basic = new Basic($this);

        return $this->basic;
    }

    /**
     * @return Image
     */
    public function getImage(): Image
    {
        $this->image = new Image($this);

        return $this->image;
    }

    /**
     * @return Music
     */
    public function getMusic(): Music
    {
        $this->music = new Music($this);

        return $this->music;
    }

    /**
     * @return Video
     */
    public function getVideo(): Video
    {
        $this->video = new Video($this);

        return $this->video;
    }

    /**
     * @return Audio
     */
    public function getAudio(): Audio
    {
        $this->audio = new Audio($this);

        return $this->audio;
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        $this->article = new Article($this);

        return $this->article;
    }

    /**
     * @return Book
     */
    public function getBook(): Book
    {
        $this->book = new Book($this);

        return $this->book;
    }

    /**
     * @return Profile
     */
    public function getProfile(): Profile
    {
        $this->profile = new Profile($this);

        return $this->profile;
    }

    /**
     * @return TwitterCard
     */
    public function useTwitterCard(): TwitterCard
    {
        $this->twitterCard = new TwitterCard($this);

        return $this->twitterCard;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param array $data
     */
    public function render(array $data)
    {
        Yii::$app->view->registerMetaTag($data);
    }
}
