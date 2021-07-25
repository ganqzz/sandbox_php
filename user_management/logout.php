<?php

require_once('config.php');
require_once('functions.php');

session_start();

// Session データの破棄
$_SESSION = array();

// Cookie の削除
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 86400, '/');
}

// Session IDの破棄
session_destroy();

header('Location: '.SITE_URL.'login.php');
