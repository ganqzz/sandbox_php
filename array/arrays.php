<?php
$a = array(2,4,"7",9,6);

var_dump(current($a));
var_dump(next($a));
var_dump(next($a));
var_dump(next($a));
var_dump(next($a));
var_dump(next($a));
var_dump(next($a));
var_dump(next($a));
var_dump(next($a));
var_dump(end($a));
var_dump(reset($a));
var_dump(end($a));
var_dump(next($a));

reset($a);
while ($e = current($a)) {
    echo $e . ", ";
    next($a);
}

$a[2] = null;
print_r($a);
unset($a[1]);
print_r($a);
$a[-2] = -2;
$a[-1] = -1;
$a[100] = 100;
print_r($a);

// PHPの配列は、連想配列と区別がない。
echo "\n";
var_dump([1, 2, 3]);
var_dump([0 => 1, 1 => 2, 2 => 3]);

echo "\n";
$a = array(20,4,"7",9,6,"hogefuga");
echo count($a)."\n";
echo max($a)."\n";
echo min($a)."\n";

$a = array(20,4,"7",9,6,"hogefuga");
sort($a);
print_r($a);  // SORT_REGULAR  型が混合するとわかりにくい。
$a = array(20,4,"7",9,6,"hogefuga");
sort($a, SORT_NUMERIC);
print_r($a);
$a = array(20,4,"7",9,6,"hogefuga");
sort($a, SORT_STRING);
print_r($a);
$a = array(20,4,"7",9,6,"hogefuga");
sort($a, SORT_NATURAL);  # 5.4~
print_r($a);
rsort($a);
var_dump($a);

$a = [2, "7foo", 3];
var_dump(in_array("7", $a));
var_dump(in_array(7, $a));  # true

list($a1, $a2, $a3) = $a;
echo $a1, $a2, $a3, "\n";
