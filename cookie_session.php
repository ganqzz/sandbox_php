<?php

// Cookie(ブラウザにデータを保存)

// setcookie
setcookie('userName', 'taguchi', time()+60*60*24*14);
echo $_COOKIE['userName'];

// 削除
setcookie('userName', '', time()-60);
echo $_COOKIE['userName'];




// セッション（サーバー側にデータを保存する）

session_start();

$_SESSION['userName'] = "taguchi";
echo $_SESSION['userName'];

unset($_SESSION['userName']);
echo $_SESSION['userName'];



