<?php
$rs = array(
    "message" => htmlentities("Hi! " . $_GET['name'], ENT_QUOTES, "UTF-8"),
    "length"  => strlen($_GET['name'])
);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($rs);
