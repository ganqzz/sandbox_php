<?php
require_once 'autoload.php';

use Classes\Calculator;
use Classes\Adder;
use Classes\Subtractor;

$c = new Calculator();

echo '<pre>', PHP_EOL;

$c->setOperation(new Adder());
$c->calculate(10, 20, 30); // 可変引数（Variadics）: func_get_args()
echo $c->getResult(), PHP_EOL;

$c->setOperation(new Subtractor());
$c->calculate(10, 20);
echo $c->getResult(), PHP_EOL;

echo '</pre>', PHP_EOL;

