<?php
header('Content-Type: application/json; charset=utf-8');

$json = array(
    'success' => false,
    'result'  => 0
);

if (isset($_POST['first'], $_POST['second'])) {
    $json['success'] = true;
    $json['result'] = (int)$_POST['first'] + (int)$_POST['second'];

}

echo json_encode($json);
