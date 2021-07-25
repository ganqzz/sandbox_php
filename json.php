<?php
$a = json_encode(["hoge" => 5]);
var_dump(json_decode($a, true));
