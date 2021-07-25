<?php
$var = "3";
echo gettype($var)."\n";
$var1 = $var + "3";
echo gettype($var1)."\n";
$var2 = $var . "3";
echo gettype($var2)."\n";
$var3 = (integer)$var;
echo gettype($var3)."\n";
echo gettype($var)."\n";
settype($var, 'integer');
echo gettype($var)."\n";
