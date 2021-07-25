<?php

require_once('config.php');
require_once('functions.php');

$dbh = connectDb();

$sql = "SELECT * FROM users ORDER BY created DESC";

foreach ($dbh->query($sql) as $row) {
    print_r($row);
}

