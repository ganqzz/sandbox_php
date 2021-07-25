<?php

$arr = [];

//
function hoge(&$a) {
    $a[] = "hoge";
}

hoge($arr);
var_dump($arr);
