<?php

declare(strict_types=1);

namespace umanskyi31\opengraph;

use umanskyi31\opengraph\Exceptions\OpenGraphException;
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

/**
 * @method Article     getArticle()
 * @method Image       getImage()
 * @method Audio       getAudio()
 * @method Book        getBook()
 * @method Basic       getBasic()
 * @method Music       getMusic()
 * @method Profile     getProfile()
 * @method Video       getVideo()
 * @method TwitterCard useTwitterCard()
 */
class OpenGraph
{
    protected $configuration;

    /**
     * OpenGraph constructor.
     */
    public function __construct()
    {
        Yii::$container->setSingletons([
            Configuration::class => OpenGraphConfiguration::class,
        ]);

        $this->configuration = Yii::$container->get(Configuration::class);
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @throws OpenGraphException
     *
     * @return object
     */
    public function __call(string $name, array $arguments = [])
    {
        $tags = $this->configuration->tags();

        if (!array_key_exists($name, $tags)) {
            throw new OpenGraphException(sprintf('The method %s does not exist', $name));
        }

        return $tags[$name];
    }
}
