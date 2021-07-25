<?php
try {
    require_once '../includes/mysqli_connect.php';
    $sql = 'INSERT INTO names (name, meaning, gender)
            VALUES ("William", "resolute guardian", "boy"),
                   ("Lucy", "light", "girl")';
    $db->query($sql);
    echo 'Rows affected: ' . $db->affected_rows . '<br>';
    echo 'Inserted with ID: ' . $db->insert_id;
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}
$db->close();