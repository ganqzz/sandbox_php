<?php
// ?id="><script>alert('or/**/1=1%23')</script>"@example.jp&pwd=1
// %23 => #
// MySQLは、#をコメント行として扱う。

var_dump($_REQUEST);

define('USERNAME', 'xxxxx');
define('PASSWORD', 'xxxxx');

$err = $id = $pwd = '';
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
// データベースに接続
$dbh = new PDO('mysql:dbname=test;host=localhost;charset=utf8', USERNAME, PASSWORD);
// SQLの組み立て
$sql = "SELECT * FROM users WHERE id ='$id' AND pwd = '$pwd'";
$stmt = $dbh->query($sql);  // クエリー実行
?>

<html>
<body>
<?php
echo 'sql= ' . htmlspecialchars($sql, ENT_NOQUOTES, 'UTF-8') . '<br>';
if ($stmt->rowCount() > 0) { // SELECTした行が存在する場合ログイン成功
    echo "ログイン成功です(id:$id)";
} else {
    echo 'ログイン失敗です';
}
$dbh = 0;
?>
</body>
</html>
