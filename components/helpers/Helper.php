<?php

namespace app\components\helpers;

interface Helper {

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name);

    /**
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value);

    /**
     * @param array $data  Set array properties
     */
    public function setArray($data);

    /**
     * @return array
     */
    public function getMetaData();
}