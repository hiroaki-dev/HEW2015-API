<?php
/**
 * Created by PhpStorm.
 * User: hiroaki
 * Date: 2016/03/01
 * Time: 17:45
 */

require_once('../model/PdoWrapper.php');
require_once('../utils/UtilsClass.php');


/**
 * 値受け取り処理
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST)) 	UtilsClass::error();
	UtilsClass::apiDebug($_POST);

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
 * DBインサート
 */
$db = new PdoWrapper('localhost', 'hew', 'hew_admin', '');
$db->begin();
$db->setTable('booth_master');
if ($add_flag == "true") {
	$flag = $db->countUp('good', "id = '".$id."'");
} else {
	$flag = $db->countDown('good', "id = '".$id."'");
}

if($flag) {
	$response = ['status' => true];
} else {
	$response = ['status' => false];
}
$db->commit();

/**
 * 出力
 */

UtilsClass::jsonOutput($response);