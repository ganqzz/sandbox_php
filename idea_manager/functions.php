<?php

function route($httpMethods, $route, $callback, $exit = true)
{
    static $path = null;
    if ($path === null) {
        $path = parse_url($_SERVER['REQUEST_URI'])['path'];
        //var_dump(parse_url($_SERVER['REQUEST_URI']));
        $scriptDir = dirname($_SERVER['SCRIPT_NAME']); // doc rootからのパスになるようにする
        //echo $scriptDir . '<br />';
        $len = strlen($scriptDir);
        if ($len > 0 && $scriptDir !== '/') {
            $path = substr($path, $len);
        }
    }

    if (!in_array($_SERVER['REQUEST_METHOD'], (array) $httpMethods)) {
        return;
    }

    $matches = null;
    $regex = '/' . str_replace('/', '\/', $route) . '/';
    if (!preg_match_all($regex, $path, $matches)) {
        return;
    }

    if (empty($matches)) {
        $callback();
    } else {
        $params = array();
        foreach ($matches as $k => $v) {
            if (!is_numeric($k) && !isset($v[1])) {
                $params[$k] = $v[0];
            }
        }
        $callback($params);
    }

    if ($exit) {
        exit;
    }
}

function get($route, $callback, $exit = true) {
    route('GET', $route, $callback, $exit = true);
}

function post($route, $callback, $exit = true) {
    route('POST', $route, $callback, $exit = true);
}
