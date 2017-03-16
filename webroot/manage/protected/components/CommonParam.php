<?php
class CommonParam{
    public $page = 1;
    public $length = 15;
    public $params = [];

    public function __get($key)
    {
        return $this->params[$key] ?: '';
    }

    public function __set($key, $value)
    {
        $this->params[$key] = $value;
    }
}