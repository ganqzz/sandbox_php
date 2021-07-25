<?php

$url = "http://user:pass@hogehoge.com:1234/fuga?fefe=awawa&pretty=good";

$parsedUrl = parse_url($url);

print_r($parsedUrl);
