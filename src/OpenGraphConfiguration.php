<?php

declare(strict_types=1);

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

class OpenGraphConfiguration implements Configuration
{
    public function tags(): array
    {
        return [
            'getBasic' => new Basic($this),
            'getImage' => new Image($this),
            'getMusic' => new Music($this),
            'getVideo' => new Video($this),
            'getAudio' => new Audio($this),
            'getArticle' => new Article($this),
            'getBook' => new Book($this),
            'getProfile' => new Profile($this),
            'useTwitterCard' => new TwitterCard($this),
        ];
    }

    /**
     * @codeCoverageIgnore
     *
     * @param array $data
     *
     * @return array|string|void
     */
    public function render(array $data)
    {
        Yii::$app->view->registerMetaTag($data);
    }
}
