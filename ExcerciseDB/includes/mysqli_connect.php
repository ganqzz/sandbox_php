<?php
$db = mysqli_connect('localhost', 'oophp', 'lynda', 'exercise');
if ($db->connect_error) {
    $error = $db->connect_error;
}
$db->set_charset('utf8');
