<?php

class Hoge
{
    public $hoge;
}

$c = new Hoge;

function hoge($a) {
    $a->hoge = "hoge";
}

hoge($c);
var_dump($c);
