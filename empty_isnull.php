<?php
$var1 = null;
$var2 = "";

echo "-- is_null --\n";
var_dump(is_null($var1));
var_dump(is_null($var2));
var_dump(is_null($var3));

echo "\n-- isset --\n";
var_dump(isset($var1));
var_dump(isset($var2));
var_dump(isset($var3));

echo "\n-- empty --\n";
var_dump(empty($var1));
var_dump(empty($var2));
var_dump(empty($var3));
$var3 = "0";
var_dump(empty($var3)); # It's TRUE!!
