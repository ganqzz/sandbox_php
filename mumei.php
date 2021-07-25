<?php

$result = 0;

$one = function()
{ var_dump($result); };

$two = function() use ($result)
{ var_dump($result); };

$three = function() use (&$result)
{ var_dump($result); };

$result++;

$one();    // outputs NULL: $result is not in scope
$two();    // outputs int(0): $result was copied at the point of declaration
$three();    // outputs int(1)


