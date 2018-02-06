<?php

namespace app\components\helpers;

/**
 * @property Video src
 * @property Video width
 * @property Video heigth
 * @property Video type
 * @property Video secure_url
 */
class Video implements Helper
{

    /**
     * @var array
     */
    private $_videoData = [
        'src',
        'width',
        'height',
        'type',
        'secure_url'
    ];


    /**
     * @var array
     */
    protected $_metaData = [];


    /**
     * @param $name
     * @return string
     * @throws \LogicException
     */
    public function __set($name, $value)
    {
        if(!in_array($name, $this->_videoData)) {
            throw new \LogicException('Not property in class');
        }

        $this->_metaData[$name] = $value;
    }


    /**
     * @param $name
     * @return string
     * @throws \LogicException
     */
    public function __get($name)
    {
        if(!in_array($name, $this->_videoData)) {
            throw new \LogicException('Not property in class');
        }

        return $this->_videoData[$name];
    }

    /**
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function setArray($data)
    {
        foreach ($data as $key => $value) {
            if(!in_array($key, $this->_metaData)) {
                throw new \InvalidArgumentException('Invalid argument in array');
            }

            $this->_metaData[$key] = $value;
        }
    }

    /**
     * Get all data
     *
     * @return array
     */
    public function getMetaData()
    {
        return $this->_metaData;
    }
}