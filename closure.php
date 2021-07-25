<?php
function name($string)
{
    $results = array(
        'upper' => strtoupper($string),
        'lower' => strtolower($string)
    );
    return $results;
}

$name = name('FeFe');
echo $name['upper'];

echo PHP_EOL;

// ちょい複雑版
function str_callback($string, $callback)
{
    $results = array(
        'upper' => strtoupper($string),
        'lower' => strtolower($string)
    );

    if (is_callable($callback)) {
        //return call_user_func($callback, $results);
        return $callback($results);
    }
}

echo str_callback(
    'FeFe',
    function ($name) {
        return $name['lower'];
    }
);
