<?php
	//連想配列
	$array = array("1" => "PHP", "2" => "図書館", "3" => "添字を", "4" => "削除", "5" => "します。");
	//表示
	echo "削除前の配列内容=>";
	echo "<br />";
	print_r($array);
	echo "<br />";
	//キー「2」「3」「5」を削除
	unset($array[2],$array[3],$array[5]);
	//表示
	echo "削除後の配列内容=>";
	echo "<br />";
	var_dump($array);
	var_dump(array("qwerty","zxcvb"));

