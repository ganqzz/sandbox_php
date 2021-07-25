<?php
var_dump($_REQUEST);
var_dump($_FILES);
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Global Variables</title>
</head>
<body>
<p>単一ファイル</p>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="upload" value="upload">
</form>
<br>

</body>
