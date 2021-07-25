<?php
//error_reporting(0);
require_once 'db/connect.php';

var_dump($_GET);
if (isset($_GET['first_name'], $_GET['last_name'])) {
    $first_name = trim($_GET['first_name']);
    $last_name = trim($_GET['last_name']);
    $people = $db->prepare("SELECT first_name, last_name FROM people WHERE first_name = ? OR last_name = ?");
    $people->bind_param('ss', $first_name, $last_name);
    $people->bind_result($first_name_r, $last_name_r); // 戻り（参照）
    $people->execute();
    $people->fetch(); // 1行取得
    echo $first_name_r . ' ' . $last_name_r . '<br>';
    // while ($people->fetch()) {
    //     echo $first_name_r . ' ' . $last_name_r . '<br>';
    // }
    $people->free_result(); // 全行fetch()が終わらない限り、次のクエリが実行できなくなるため、必ず解放するようにする。
    // $people->close(); // もしくは、close()する。
}

//$result = $db->query('SELECT * FROM people') or die ($db->error);

//foreach($db->query('SELECT * FROM people') as $row){
//    print_r($row);
//}

//$rows = $db->query('SELECT * FROM people')->fetch_all(MYSQLI_ASSOC);
//print_r($rows);

//if ($result = $db->query("UPDATE people SET created = NOW()")) {
//    echo $db->affected_rows;
//}

echo '<hr>';
if ($result = $db->query("SELECT * FROM people")) {
    if ($count = $result->num_rows) {
        var_dump($count);
        //var_dump($db->affected_rows); // SELECTの行数も取得可能。
        while ($row = $result->fetch_assoc()) {
            echo $row['first_name'] . ' ' . $row['last_name'] . '<br>';
        }
    }
    $result->free();
}

//$query = $db->real_escape_string(trim(" ho'ge   "));
//echo $query;
