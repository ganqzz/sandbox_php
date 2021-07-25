<?php

var_dump("fefe" > 3);
var_dump("fefe" > "3");
var_dump("05fefe" > "3");
var_dump("5fefe" > "3");
echo "\n";
var_dump("5fefe" + "3");

echo "\n";
$a = "fefe
awawa";

$b = "fefe\
awawa";

echo "\n";
echo $a, "\n", $b, "\n";

$c = null;
$d = "";

var_dump($c == "");
var_dump($c === "");
var_dump($d == null);
var_dump($d === null);
var_dump(is_null($d));

echo "\n";
var_dump(is_int("0"));
var_dump(is_numeric("0"));
var_dump(gettype("0"));

echo "\n";
$s = "The quick brown fox jumped over the lazy dog.\n jack has a bat and two balls.";
echo strtolower($s)."\n";
echo strtoupper($s)."\n";
echo ucfirst($s)."\n";  # ピリオドを解釈しない。あくまで文字列の先頭だけ。
echo ucwords($s)."\n";

echo strlen($s)."\n";
echo strstr($s, "brown")."\n";  # 最初にマッチしたところから文字列終端までを返す。
echo strchr($s, "z")."\n";  # strstr()のエイリアス。
echo strrchr($s, "two")."\n";  # 最後にマッチしたところから文字列終端までを返す。
echo str_replace("quick", "super-fast", $s)."\n";
echo strpos($s, "brown")."\n";
echo substr($s, 5, 10)."\n";

