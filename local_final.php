<?php
class Hoge {
    public static function a() {
        define('LOCATOR',   "/locator");
        $x = "hoge";
        echo $x;
        echo LOCATOR;
    }
}

Hoge::a();
