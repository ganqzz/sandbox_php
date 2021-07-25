<?php
function camelize($str) {
  $str = strtr($str, '_', ' ');
  $str = ucwords($str);
  return str_replace(' ', '', $str);
}

function snakeToCamel($s) {
    $s = strtr($s, '_', ' ');
    $s = ucwords($s);
    $s = lcfirst($s);
    return str_replace(' ', '', $s);
}

$a = 'fefe_awawa';
//$a = strtr($a, '_', ' ');
//$a = camelize($a);
$a = snakeToCamel($a);
echo $a;

