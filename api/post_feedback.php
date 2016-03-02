<?php
/**
 * Created by PhpStorm.
 * User: hiroaki
 * Date: 2016/03/01
 * Time: 17:45
 */

require_once('../model/PdoWrapper.php');
require_once('../utils/UtilsClass.php');

$fdata = "./data.csv";
$fdata_pt = @fopen($fdata, 'w');
if (!$fdata_pt) {
	err_sub('エラー', 'ファイルオープンエラー', 'data.csvを開くことができません');
}
/**
 * 値受け取り処理
 */

ob_start();
var_dump($_POST);
$out = ob_get_contents();
ob_end_clean();
file_put_contents($fdata, $out);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST)) 	UtilsClass::error();
	foreach ($_POST as $index => $value) {
		if (isset($index)) {
			if (!empty($value)) {
				$$index = $value;
//				if($index=='answers') {
//					$value = "\n";
//					foreach($value as $index2 => $value2) {
//						$value .= "\t$index2 → $value2\n";
//					}
//				}
//				$row = "index = ".$index. " ,      value = ". $value . "\n";
//				fputs($fdata_pt, $row);

				continue;
			}
		}
		UtilsClass::error();
	}
} else {
	UtilsClass::error();
}

fclose($fdata_pt);