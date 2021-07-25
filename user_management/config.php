<?php

/* slqite */
define('DSN', 'sqlite:db.sqlite3');
define('DB_USER', '');
define('DB_PASSWORD', '');

define('SITE_URL', 'http://localhost:4567/');
define('PASSWORD_KEY', '**********'); // Salt

error_reporting(E_ALL & ~E_NOTICE);

session_set_cookie_params(0, '/');
