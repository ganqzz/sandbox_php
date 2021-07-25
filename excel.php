<?php

// CASE 1.新規Excelファイルを作成しB1とB2のセルに値を入力しファイルを保存する
$excel->setWorksheet(0)->setValue(1,0,"Hello")->setValue(1,1,"world!")->save();

// CASE 2.新規Excelファイルを作成し複数のセルに値を入力しファイルを保存する
$data = array();
$data[1][0] = "Hello";
$data[1][1] = "world!";
$excel->setWorksheet(0)->setValues($data)->save();

// CASE 3.既存Excelファイルを読み込み複数のセルに値を入力しファイルを保存する
$data = array();
$data[1][0] = "Hello";
$data[1][1] = "world!";
$excel->load($path,"template.xlsx")->setWorksheet(0)->setValues($data)->save();

// CASE 4.日本語を出力
$excel->setWorksheet(0)->setValue(1,0,"ハロー")->setValue(1,1,"ワールド！")->save();

// CASE 5.ワークシート名の日本語対応
$excel->load($path,"template.xlsx")->setWorksheetName("日本語名シート")->setValue(1,0,"Hello")->setValue(1,1,"world!")->save();

// CASE 6.セル名のアルファベット対応
$excel->setWorksheet(0)->setValueName("B1","Hello")->setValueName("B2","world!")->save();

// CASE 7.いろいろな組み合わせ
$data = array();
$data[0][0] = "A1　テスト";
$data[0][1] = "A2　テスト";
$data[1][0] = "B1　テスト";
$data[1][1] = "B2　テスト";
$excel->setWorksheet(0)
  ->setValues($data)
  ->setValueName("C1","C1　テスト")
  ->setValue(2,1,"C2　テスト")
  ->save();

// ###セルのコピー###
// CASE 8. R1C1 形式コピー, 書式コピーあり
$excel->copyCell(array(0, 0), array(5, 6), true); // A1, G6
$excel->save();

// CASE 9.
$excel->copyCell(array(1, 2), array(5, 6), true); // C2, G6 
$excel->save();

// CASE 10. R1C1 形式コピー, 書式コピーなし
$excel->copyCell(array(1, 0), array(5, 6), false); // A2, G6
$excel->save();

// CASE 11.
$excel->copyCell(array(2, 2), array(5, 6), false); // C3, G6 
$excel->save();


// CASE 12. A1 形式コピー, 書式コピーあり
$excel->copyCellByA1('A1', 'G6', true);
$excel->save();

// CASE 13.
$excel->copyCellByA1('C2', 'G6', true);
$excel->save();

// CASE 14. A1 形式コピー, 書式コピーなし
$excel->copyCellByA1('A2', 'G6', false);
$excel->save($path,"copy_test_01_result_07.xlsx");

// CASE 15.
$excel->copyCellByA1('C3', 'G6', false); // C3, G6 
$excel->save();


