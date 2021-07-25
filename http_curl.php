<?php
$ch   = curl_init();
$data = array("param1" => "foo", "param2" => "bar", "param3" => "日本語テスト");

curl_setopt($ch, CURLOPT_URL, "http://localhost/home/sandbox_php/foo.php");
curl_setopt($ch, CURLOPT_HEADER, true);	// ヘッダーも取得
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	// 文字列で取得
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$output = curl_exec($ch);
$errno = curl_errno($ch);
$err = curl_error($ch);
curl_close($ch);

echo nl2br(htmlspecialchars($output));
// list($status, $header, $html) = explode("\x0d\x0a\x0d\x0a", $output, 3);
// echo "[errno]------------------------<br />\n";
// echo nl2br(htmlspecialchars($errno . "\r\n"));
// echo "[error]------------------------<br />\n";
// echo nl2br(htmlspecialchars($err . "\r\n"));
// echo "[status]------------------------<br />\n";
// echo nl2br(htmlspecialchars($status . "\r\n"));
// echo "[header]------------------------<br />\n";
// echo nl2br(htmlspecialchars($header . "\r\n"));
// echo "[html]------------------------<br />\n";
// echo nl2br(htmlspecialchars($html));
