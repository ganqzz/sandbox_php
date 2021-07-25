<?php
// Session初期化
session_start();

// POSTでdataがあればSessionへ保存
if (isset($_POST['data'])) {
    $_SESSION['data'] = htmlentities($_POST['data'], ENT_QUOTES, "UTF-8");
} else {
    unset($_SESSION['data']); // clear data
}
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Session Test</title>
</head>
<body>
<form method="post" action="">
    <label for="data">Enter Data: </label>
    <input type="text" name="data" id="data" value="<?= isset($_SESSION['data']) ? $_SESSION['data'] : '' ?>">
    <input type="submit" value="Submit">
</form>
</body>
</html>
