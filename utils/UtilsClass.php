<?php

/**
 * Created by PhpStorm.
 * User: hiroaki
 * Date: 2016/02/29
 * Time: 23:50
 */
class UtilsClass {

	public static function jsonOutput($array){
		header('Content-type: application/json');
		echo json_encode($array);
	}

	public static function error() {
		header('Content-type: application/json');
		echo "エラー";
		echo json_encode(['status'=>false]);
		exit;
	}

	public static function apiDebug($var, $append_flag = null) {
		$fdata = "./debug.txt";
		ob_start();
//		echo $var."\n";
		var_dump($var);
		$out = ob_get_contents();
		ob_end_clean();
		if (isset($append_flag)) {
			file_put_contents($fdata, $out, FILE_APPEND);
		} else {
			file_put_contents($fdata, $out);
		}
	}

}