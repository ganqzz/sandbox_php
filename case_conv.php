<?php
function pascalize($string)
{
    $string = strtolower($string);
    $string = str_replace('_', ' ', $string);
    $string = ucwords($string);
    $string = str_replace(' ', '', $string);
    return $string;
}

function camelize($string)
{
    $string = pascalize($string);
    $string[0] = strtolower($string[0]);
    return $string;
}

function snake_case($string)
{
    $string = preg_replace('/([A-Z])/', '_$1', $string);
    $string = strtolower($string);
    return ltrim($string, '_');
}

function camelize2($str) {
    $str = strtr($str, '_', ' ');
    $str = ucwords($str);
    return str_replace(' ', '', $str);
}


function snakize($str) {
    $str = preg_replace('/[A-Z]/', '_\0', $str);
    $str = strtolower($str);
    return ltrim($str, '_');
}

// Example
$strings = array(
    'snake_case_string',
    'SNAKE_CASE_STRING_UPPER',
    'camelCaseString',
    'PascalCaseString',
);

foreach ($strings as $string)
{
    echo 'pascalized:  ';
    echo pascalize($string)."\n";

    echo 'camelized:   ';
    echo camelize($string)."\n";

    echo 'snake-cased: ';
    echo snake_case($string)."\n";

    echo "------\n";
}

