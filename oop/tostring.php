<?php
class Hoge
{
    //
    function __toString()
    {
        return "Hoge!!";
    }
}

$hoge = new Hoge();
echo $hoge;
