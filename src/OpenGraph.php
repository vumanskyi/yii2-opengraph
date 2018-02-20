<?php

namespace umanskyi31\opengraph;


use Yii;
use yii\web\View;

/**
 *
 * Class register all type of metadata for Open Graph
 * If need use only basic data - just register in current class
 * If need more your can create own and register here
 *
 * @property OpenGraph optMetaData
 * @property OpenGraph title
 * @property OpenGraph description
 * @property OpenGraph type
 * @property OpenGraph url
 * @property OpenGraph image
 * @property OpenGraph audio
 * @property OpenGraph locale
 * @property OpenGraph site_name
 * @property OpenGraph video
 * @property OpenGraph music
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
        'audio',
        'music'
    ];

    /**
     * @var array
     */
    private $_components = [];

    /**
     * @var string $name
     */
    public function __get($name)
    {
        $this->_components[$name];
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        $this->_components[$name] = $value;
    }

    public function __construct()
    {
        Yii::$app->view->on(
            View::EVENT_BEGIN_PAGE,
            function() {
                foreach ($this->_components as $key => $value) {
                    $key = in_array($key,self::$_metadata) ? 'og:' . $key : $key;
                    $this->registerOpenGraph($key, $value);
                }
            }
        );
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
     * @param bool  $register Register new OG component
     * @throws \InvalidArgumentException
    */
    public function optMetaData(array $opt, bool $register = false)
    {
        foreach ($opt as $key => $value) {
            if(!in_array($key, self::$_metadata) && !$register) {
                throw new \InvalidArgumentException('Invalid argument in array');
            }

            $key = $register ? $key : 'og:' . $key;
            $this->_components[$key] = $value;
        }
    }

}