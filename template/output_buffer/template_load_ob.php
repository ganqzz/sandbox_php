<?php

$value1 = 'Hello';
$value2 = 'World';

ob_start(); // ...(1)
require 'template.php'; // ...(2)
$contents = ob_get_clean(); // ...(3)

echo 'テンプレートを読み込んだよ<br />'; // ...(4)

echo $contents; // ...(5)
