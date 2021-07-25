<?php
try {
    require_once '../includes/pdo_connect_sqlite.php';
    $sql = 'INSERT INTO names (name, meaning, gender)
            VALUES ("William", "resolute guardian", "boy")';
    $affected = $db->exec($sql);
    echo $affected . ' row inserted with ID ' . $db->lastInsertId();
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}
