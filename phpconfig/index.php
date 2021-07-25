<?php

use Project\Helpers\Config;

require 'app/Config.php';

$config = new Config();
$config->load('config.php');

echo $config->get('db.hosts.secondary', 'Default');
