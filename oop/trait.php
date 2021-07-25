<?php

trait StaticExample {
    static $hoge = "Hogee";
    public static function doSomething() {
        return static::$hoge . 'Doing something';
    }
}

class Example {
    use StaticExample;
}

echo Example::doSomething(), PHP_EOL;
echo Example::$hoge, PHP_EOL;
