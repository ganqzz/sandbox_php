<?php
// あいうえお UTF-8

// JSON file -> Assoc array
function getConfig($f) {
  return json_decode(file_get_contents($f, true), true);
}

// Request Parameters -> Query String
function requestToStr($a) {
  if (empty($a)) return "";

  $s = "?";
  foreach ($a as $k => $v) {
    if ($s != "?") $s .= "&";
    $s .= "{$k}={$v}";
  }
  return $s;
}

// Escape Single Quote
function escSq($s) {
  return str_replace("'", "''", $s);
}

// Escape LIKE Special Characters (SQL Server)
function escLikeSpecial($s) {
  return preg_replace('/[%_\[]/', '[$0]', $s);
}

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function rmCrLf($s) {
  return str_replace(array("\r\n","\r","\n"), '', $s);
}

function snakeToCamel($s) {
    return str_replace(' ', '', lcfirst(ucwords(strtr($s, '_', ' '))));
}

