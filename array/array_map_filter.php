<?php
$array = array(1,2,3);
// $mapped = array_map(create_function('$v', 'return $v *= 10;'), $array);
$mapped = array_map(function ($v) { return $v *= 10; }, $array);
var_dump($mapped);

$array = array(1,2,3,4);
// $filtered = array_filter($array, create_function('$v', 'return ($v > 2);'));
$filtered = array_filter($array, function ($v) { return ($v > 2); });
var_dump($filtered);
