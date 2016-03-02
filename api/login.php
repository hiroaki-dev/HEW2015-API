<?php
/**
 * Created by PhpStorm.
 * User: hiroaki
 * Date: 2016/02/29
 * Time: 23:34
 */

require_once('../model/PdoWrapper.php');
require_once('../utils/UtilsClass.php');

/**
 * 値受け取り処理
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST)) 	UtilsClass::error();
	foreach ($_POST as $index => $value) {
		if (isset($index)) {
			if (!empty($value)) {
				$$index = $value;
				continue;
			}
		}
		UtilsClass::error();
	}
} else {
	UtilsClass::error();
}

/**
 * DB検索
 */
$db = new PdoWrapper('localhost', 'hew', 'root', '');
$db->setTable('student_master');
$student = $db->getTargetList("id = '".$id."' AND password = '".$password."'");

/**
 * 出力
 */
if (empty($student)) {
	$response = ['status'=>false];
} else {
	$response = ['status'=>true];
}
UtilsClass::jsonOutput($response);


