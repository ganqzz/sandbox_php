<?php
//error_reporting(0);
require_once 'db/connect.php';
require_once 'functions/security.php';

//$sql = "SELECT * FROM people";
$sql = <<<EOF
SELECT people.first_name, countries.name AS country FROM people
LEFT JOIN countries ON people.country = countries.id
EOF;

$results = $db->query($sql);

if ($results instanceof mysqli_result && $results->num_rows) {
    while ($row = $results->fetch_object()) {
        echo "{$row->first_name} ({$row->country})<br>";
    }
} else {
    echo 'No results.';
}

