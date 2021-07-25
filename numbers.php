<?php

echo abs(-300)."\n";
echo pow(2, 3)."\n";
echo sqrt(-100)."\n";
echo sqrt(100)."\n";
echo "\n";
echo fmod(20, 7)."\n";
echo 20 % 7 ."\n";
echo fmod(10.4, 4.3)."\n";
echo "\n";
echo rand()."\n";
echo rand(1, 10)."\n";
echo mt_rand()."\n";  # 改良版
echo mt_rand(1, 10)."\n";

echo "\n";
echo 1 + "1aaa"."\n";

echo "\n";
echo 10.2 + 0.1 ."\n";
echo 3.14159265 + 0.1 ."\n";
echo 10 / 3 ."\n";

echo "\n";
echo round(3.1, 1)."\n";
echo ceil(3.1)."\n";
echo floor(3.1)."\n";

echo "\n";
var_dump(1.);
var_dump(is_int(1)) ."\n";
var_dump(is_int(1.0)) ."\n";
var_dump(is_int("1")) ."\n";
echo "\n";
var_dump(is_float(1)) ."\n";
var_dump(is_float(1.0)) ."\n";
var_dump(is_float(1.)) ."\n";
var_dump(is_float("1.0")) ."\n";
echo "\n";
var_dump(is_numeric(1)) ."\n";
var_dump(is_numeric(1.0)) ."\n";
var_dump(is_numeric("1.0")) ."\n";  # true
var_dump(is_numeric("1.")) ."\n";  # true
var_dump(is_numeric("1hoge")) ."\n";  # false しかし、数値計算/比較は可能。
