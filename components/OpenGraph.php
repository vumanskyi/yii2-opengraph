<?php

namespace app\components;


use Yii;
use yii\web\View;
use app\components\helpers\Image;
use app\components\helpers\Audio;

/**
 *
 * Class register all type of metadata for Open Graph
 * If need use only basic data - just register in current class
 * If need more your can create own and register here
 *
 * @property $opengraph \app\components\OpenGraph
 * @property OpenGraph optMetaData
 * @property Image image
 * @property Audio audio
 */
class OpenGraph
{
    /**
     * Metadata basic
     *
     * @var array
     */
    private static $_metadata = [
        'title',
        'type',
        'url',
        'image',
        'description',
        'audio',
        'locale',
        'site_name',
        'video',
        'audio'
    ];

    public function __construct()
    {

        $this->image = new Image;

        $this->audio = new Audio;

        Yii::$app->view->on(
            View::EVENT_BEGIN_PAGE,
            function() {
                $this->startLoadInView();
            }
        );
    }


    protected function startLoadInView()
    {
        if (isset($this->image)) {
            if($this->image->getMetaData()) {
                foreach ($this->image->getMetaData() as $key => $value) {
                    $this->registerOpenGraph('og:image'. ':' . $key, $value);
                }
            }
        }

        if (isset($this->audio)) {
            if($this->audio->getMetaData()) {
                foreach ($this->audio->getMetaData() as $key => $value) {
                    $this->registerOpenGraph('og:audio'. ':' . $key, $value);
                }
            }
        }
    }

    /**
     * @param string $name
     * @param array $params
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function __call($name, $params)
    {
        if(!in_array($name, self::$_metadata)) {
            throw new \InvalidArgumentException('Not reserved value in params');
        }

        $this->registerOpenGraph('og:' . $name, array_shift($params));
    }

    /**
     * Register new element of open graph
     *
     * @param string $property Property for metadata
     * @param mixed $content Content for metadata
     * @throws \InvalidArgumentException
    */
    protected function registerOpenGraph(string $property, string $content)
    {
        $property = str_replace(':src', '', $property);

        Yii::$app->view->registerMetaTag([
            'property' => $property,
            'content'  => $content
        ]);
    }

    /**
     * Set array for all metadata
     * Example for use
     * [
     *  'title'       => 'Lorem ipsum',
     *  'description' => 'lorem ipsum'
     * ]
     *
     * @param array $opt Set data array
     * @throws \InvalidArgumentException
    */
    public function optMetaData(array $opt)
    {
        foreach ($opt as $key => $value) {
            if(!in_array($key, self::$_metadata)) {
                throw new \InvalidArgumentException('Invalid argument in array');
            }
            $this->registerOpenGraph('og:' . $key, $value);
        }
    }

}