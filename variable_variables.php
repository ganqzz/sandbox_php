<?php
// Variable Variables
$a = "hello";
$hello = "Hello everyone.";
echo $a . PHP_EOL;
echo $hello . PHP_EOL;

echo $$a . PHP_EOL;

// What does $$var[1] mean?
// #1: get the first element then evaluate dynamically?
// #2: evaluate dynamically then get the first element?

// Use {} to make it clear:
// echo ${$var[1]};  // for #1
// echo ${$var}[1];	 // for #2

