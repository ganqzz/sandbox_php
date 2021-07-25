#!/usr/bin/env php
<?php
/**
 * treeコマンドのPHP5.3による実装例。
 */
namespace Tree;

//iterator類は名前が長いので短縮
use RecursiveDirectoryIterator as RDI,
    RecursiveFilterIterator as RFI,
    RecursiveTreeIterator as RTI;

$opt = getopt('adL:');

//$di = new RDI('.');
$di = new RDI($argv[1]);

// -a で"."から始まるファイルも表示。 --------------
// 通常は"."をフィルタする
if (!isset($opt['a'])) {
    $di = new DotFilter($di);
}

class DotFilter extends RFI
{
    function accept()
    {
        $fname = $this->current()->getFilename();
        return $fname[0] !== '.';
    }
}

// -d で ディレクトリのみにフィルタ -----------------
if (isset($opt['d'])) {
    $di = new FileFilter($di);
}

class FileFilter extends RFI
{
    function accept()
    {
        return $this->current()->isDir();
    }
}

$rti = new RTI($di, RTI::BYPASS_CURRENT);
// デザインを少し変更。Unix風
$rti->setPrefixPart(RTI::PREFIX_END_LAST, '`-');
$rti->setPrefixPart(RTI::PREFIX_RIGHT, '- ');

// -L n で深さを指定
if (isset($opt['L'])) {
    $rti->setMaxDepth((int)$opt['L'] - 1);
}

foreach ($rti as $file) {
    echo $rti->getPrefix();
    echo $file->getFilename();
    echo PHP_EOL;
}

