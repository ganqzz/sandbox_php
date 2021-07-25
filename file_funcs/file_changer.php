<?php
// If safe mode is on (in php.ini) then this PHP script 
// will only be able to modify files that have the same
// owner as this script has.

$file = '../out/filetest.txt';

echo fileowner($file);
echo "<br />";

// if we have Posix installed
$owner_id = fileowner($file);
$owner_array = posix_getpwuid($owner_id);
echo $owner_array['name'];

echo "<br />";

chown($file, 'kevin');
// chown only works if PHP is superuser
// making webserver/PHP a superuser is a big security issue

// if we have Posix installed
$owner_id = fileowner($file);
$owner_array = posix_getpwuid($owner_id);
echo $owner_array['name'];

echo "<br />";

echo substr(decoct(fileperms($file)), 2);
chmod($file, 0444);
echo substr(decoct(fileperms($file)), 2);

echo "<br />";
echo is_readable($file) ? 'yes' : 'no';
echo "<br />";
echo is_writable($file) ? 'yes' : 'no';
echo "<br />";
