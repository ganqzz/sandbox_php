<?php
header('Content-Type:text/html;charset=Shift_JIS');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>
<body>
<pre>あいうえおかきくけこ</pre>
</body>
</html>
<?php
// Output bufferingが無効だと、以下は機能しない。
header('Location:info.php');
?>
