<?php
$dsn = 'sqlite:../db/exercise.db';

$db = new PDO($dsn);
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable statement exception
