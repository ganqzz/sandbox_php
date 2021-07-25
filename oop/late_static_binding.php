<?php
class ConnPool {
    private static $onlyOne;
    protected static $klass = __CLASS__;

    public static function getInstance() {
        if (!is_object(self::$onlyOne)) {
            // self::$onlyOne = new self::$klass();
            self::$onlyOne = new static::$klass();
        }
        return self::$onlyOne;
    }
}

class ConnPoolAS400 extends ConnPool {
    protected static $klass = __CLASS__;
}

$db = ConnPoolAS400::getInstance();
echo get_class($db) . PHP_EOL; // self => 'ConnPool', static => 'ConnPoolAS400'
