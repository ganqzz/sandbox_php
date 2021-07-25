<?php

namespace Project\Helpers;

class Config
{
    protected $data;
    protected $default;

    public function load($file)
    {
        $this->data = require $file;
        //var_dump($this->data);
    }

    public function get($key, $default = null)
    {
        $this->default = $default;
        $segments = explode('.', $key);
        $node = $this->data; // 初期

        foreach($segments as $segment) {
            if(isset($node[$segment])) {
                $node = $node[$segment]; // 再帰的
            } else {
                $node = $default;
                break;
            }
        }

        return $node;
    }

    public function exists($key)
    {
        return $this->get($key) !== $this->default;
    }

}
