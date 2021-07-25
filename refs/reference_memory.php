<?php
function profile($funcname)
{
    $bigarray = range(1, 100000);

    echo $funcname . "\n";

    if ($funcname) {
        $start = microtime(true);
        $ret = $funcname($bigarray, 50000);
        $end = microtime(true);
    } else {
        $start = microtime(true);
        $end = microtime(true);
    }

    echo "  caller memory: " . number_format(memory_get_usage()) . "\n";
    echo "  time: " . (($end - $start) * 1000) . "(ms)\n";
    unset($bigarray);
    unset($ret);
}

ob_start();
profile(null); // ウォームアップ
ob_end_clean();

// 参照なし
function nop_noref($arr)
{
    echo "  callee memory: " . number_format(memory_get_usage()) . "\n";
    return $arr;
}

// 参照渡しのみ
function nop_ref_arg(&$arr)
{
    echo "  callee memory: " . number_format(memory_get_usage()) . "\n";
    return $arr;
}

// 参照渡し+参照返し
function &nop_ref_both(&$arr)
{
    echo "  callee memory: " . number_format(memory_get_usage()) . "\n";
    return $arr;
}

profile('nop_noref');
profile('nop_ref_arg');
profile('nop_ref_both');

// nop_noref
//   callee memory: 144,639,072
//   caller memory: 144,639,072
//   time: 0.028133392333984(ms)

// nop_ref_arg
//   callee memory: 144,639,128
//   caller memory: 241,027,888 ← コール後にメモリ増大
//   time: 106.05406761169(ms) ← なんだこれは

// nop_ref_both
//   callee memory: 144,639,112
//   caller memory: 144,639,112
//   time: 0.034093856811523(ms)

function x2at_noref($arr, $index)
{
    echo "  callee memory1: " . number_format(memory_get_usage()) . "\n";
    $arr[$index] *= 2;
    echo "  callee memory2: " . number_format(memory_get_usage()) . "\n";
    return $arr;
}

function &x2at_ref(&$arr, $index)
{
    echo "  callee memory1: " . number_format(memory_get_usage()) . "\n";
    $arr[$index] *= 2;
    echo "  callee memory2: " . number_format(memory_get_usage()) . "\n";
    return $arr;
}

profile('x2at_noref');
profile('x2at_ref');

// x2at_noref
//   callee memory1: 144,639,360
//   callee memory2: 241,028,168 ← ここでメモリを大幅に確保
//   caller memory: 241,028,168
//   time: 111.29093170166(ms) ← コピーコスト

// x2at_ref
//   callee memory1: 144,639,376
//   callee memory2: 144,639,376
//   caller memory: 144,639,376
//   time: 0.036954879760742(ms)
