<?php

function func($a)
{
    $a = "inner";

    $b = function () use ($a) {
        echo $a . PHP_EOL;
        $a = "closure";
        echo $a . PHP_EOL;
    };
    $b();

    echo $a . PHP_EOL;
}

$s = "outer";
func($s);

echo $s . PHP_EOL;
