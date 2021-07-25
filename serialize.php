<?php

$a = [
    'hoge' => 'awawawa',
    'fuga' => 'fugafuga',
    'hoge2' => 'あわわ',
    'fuga2' => 'ふがふが',
    'hoge3' => 'あわわ',
    'fuga3' => 'ふがふが',
];

var_dump(serialize($a));
$b = json_encode($a, JSON_UNESCAPED_UNICODE);
var_dump($b);
var_dump(json_decode($b, true));
