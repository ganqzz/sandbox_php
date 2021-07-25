<?php
$db = new mysqli('localhost', 'ganq', 'hawkeye', 'ganq');

if ($db->connect_errno) {
    die('Sorry, we are having some troubles.' . $db->connect_error);
}
