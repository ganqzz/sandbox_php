<?php

function wget($url, $param=array()) {
    $timeout = 30;
    $method = count($param) ? 'POST' : 'GET';	// $param要素あればPOST
    if (!$purl = parse_url($url)) return array('', ''); // URL分解
    if (empty($purl['port'])) $purl['port'] = 80;

    // HTTPリクエスト
    $fp = fsockopen($purl['host'], $purl['port'], $errno, $errstr, $timeout);
    if (!$fp) {
        die("$errstr ($errno)<br />\n");
    }
    if (!empty($purl['query'])) $purl['path'] .= "?{$purl['query']}";
    if (substr($purl['path'], 0, 1) !== '/') $purl['path'] = '/' . $purl['path'];
    $data = $method === 'POST' ? http_build_query($param, '', '&') : '';
    $cl = empty($data) ? '' : "Content-Length: " . strlen($data) . "\r\n";
    $out = "$method {$purl['path']} HTTP/1.1\r\n"
         . "Host: {$purl['host']}\r\n"
         //. "User-Agent: PHP-Script/1.0\r\n"
         . "Content-Type: application/x-www-form-urlencoded\r\n"
         . $cl
         . "Connection: Close\r\n\r\n"
         . $data;
    fwrite($fp, $out);

    // HTTPレスポンス取得
    stream_set_timeout($fp, $timeout);
    $header = $html = '';
    while (!feof($fp)) {
        $info = stream_get_meta_data($fp);
        if ($info['timed_out']) die("timeout!"); // TCP
        // 空行が入ってしまう。
        // if (empty($html)
        //     && substr($header, -4) !== "\x0d\x0a\x0d\x0a"
        //     && $header .= fgets($fp)) continue;
        if (empty($html)
            && ($s = fgets($fp)) !== "\x0d\x0a") {
            $header .= $s;
            continue;
        }
        $html .= fgets($fp);
    }
    fclose($fp);

    return array($header, $html);
}

list($header, $html) = wget("http://localhost/home/sandbox_php/foo.php", array("param1"=>"foo","param2"=>"bar","param3"=>'日本語テスト'));
echo "[header]-------------------------------<br />\n";
echo nl2br(htmlspecialchars($header));
echo "[html]-------------------------------<br />\n";
echo nl2br(htmlspecialchars($html));

