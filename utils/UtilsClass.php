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
		echo json_encode(['status'=>false]);
		exit;
	}
}