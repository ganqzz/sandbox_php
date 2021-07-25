<?php
$var = 1;

function test()
{
    static $var = 10;
    echo $var . PHP_EOL;
    $var++;
}

test();
test();
test();

echo $var . PHP_EOL;
