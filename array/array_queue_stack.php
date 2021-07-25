<?php
// Array Functions

// Queue
$numbers = array(1, 2, 3, 4, 5, 6);
print_r($numbers);
echo PHP_EOL;

// shifts first element out of an array
// and returns it.
$a = array_shift($numbers);
echo "a:" . $a . PHP_EOL;
print_r($numbers);
echo PHP_EOL;

// prepends an element to an array,
// returns the element count.
$b = array_unshift($numbers, 'first');
echo "b: " . $b . PHP_EOL;
print_r($numbers);
echo PHP_EOL;

echo "---" . PHP_EOL;

// Stack
// pops last element out of an array
// and returns it.
$a = array_pop($numbers);
echo "a: " . $a . PHP_EOL;
print_r($numbers);
echo PHP_EOL;

// pushes an element onto the end of an array,
// returns the element count.
$b = array_push($numbers, 'last');
echo "b: " . $b . PHP_EOL;
print_r($numbers);
echo PHP_EOL;

