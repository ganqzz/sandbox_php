<?php
define('USERNAME', 'xxxxx');
define('PASSWORD', 'xxxxx');

$err = $id = $pwd = '';
var_dump($_REQUEST);
// ユーザID(メールアドレス)のバリデーション
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_EMAIL)) {
    $id = $_GET['id'];   // ユーザID
} else {
    $err .= 'ユーザIDはメールアドレスを指定してください<br>';
}
// パスワード（英数字）のバリデーション
if (isset($_GET['pwd']) && ctype_alnum($_GET['pwd'])) {
    $pwd = $_GET['pwd']; // パスワード
} else {
    $err .= 'パスワードは英数字を指定してください<br>';
}
if ($err !== '') {
    die($err); // バリデーションエラーの場合はエラーメッセージを表示して終了
}
?>

<html>
<body>
<?php
echo "(id:$id pwd:$pwd)";
$dbh = 0;
?>
</body>
</html>
