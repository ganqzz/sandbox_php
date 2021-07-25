<?php

// クエリパラメータは、大小区別する
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST['text']);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // $hoge = isset($_GET['hoge']) ? $_GET['hoge']: null;
    // var_dump($hoge);
    var_dump($_GET);
}
?>

<h3>Form</h3>
<form method="post" action="">
    <input type="text" name="text" value="hoge">
    <input type="submit" value="Send">
</form>
