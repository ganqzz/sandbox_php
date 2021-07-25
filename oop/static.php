<?php

class Foo
{
    static $hoge = 'HOGE';

    static function aStaticMethod($a)
    {
        return strrev($a);
    }

    function insMethod()
    {
        $hoge = 'FUGA';
        return $hoge;
    }
}

echo Foo::aStaticMethod("fefe") . "\n";
$classname = 'Foo';
echo $classname::aStaticMethod("hoge"), PHP_EOL; // PHP 5.3.0 で対応

$x = new Foo;
echo $x->insMethod();
