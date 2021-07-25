<?php
class Hoge
{
    const HOGE = 'Hoge!!';
    function display() {
        echo static::HOGE;
    }
}

$hoge = new Hoge();
$hoge->display();
