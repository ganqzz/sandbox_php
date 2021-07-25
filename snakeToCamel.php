<?php
function snakeToCamel($s) {
    return str_replace(' ', '', lcfirst(ucwords(strtr($s, '_', ' '))));
}

$a = 'fefe_awawa';
$a = snakeToCamel($a);
echo $a;
