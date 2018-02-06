<?php

namespace app\components\helpers;

/**
 * @property Image src
 * @property Image width
 * @property Image height
 * @property Image alt
 * @property Image type
 * @property Image secure_url
*/
class Image implements Helper
{

    /**
     * @var array
     */
    private $_imageData = [
        'src',
        'width',
        'height',
        'alt',
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
        if(!in_array($name, $this->_imageData)) {
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
        if(!in_array($name, $this->_imageData)) {
            throw new \LogicException('Not property in class');
        }

        return $this->_imageData[$name];
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