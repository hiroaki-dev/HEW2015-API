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

	UtilsClass::apiDebug($_POST);
	// 意見トランザクション挿入
	if (!empty($content)) {
		$db->setTable('opinion_table');
		$params = [
			'student_id' => $student_id,
			'booth_id' => $booth_id,
			'content' => $content
		];
		$db->setColumns($params);
		$db->insert();
		$db->clearColumns();
	}

	// 回答トランザクション挿入
	if (!empty($answers)) {
		$db->setTable('answer_table');
		foreach ($answers as $answer) {
			list($object_name, $content) = explode("=", $answer);

			$vowels = [" ", "[", "]", "{", "}"];
			$csv = str_replace($vowels, "", $content);

			list($id, $boothId, $studentId, $eventCategoryId, $questionnaireLineNum, $answerNum) = explode(',', $csv);
			$params = [
				'booth_id' => explode(':', $boothId)[1],
				'student_id' => explode(':', $studentId)[1],
				'event_category_id' => explode(':', $eventCategoryId)[1],
				'questionnaire_line_num' => explode(':', $questionnaireLineNum)[1],
				'answer_num' => explode(':', $answerNum)[1],
			];

//		UtilsClass::apiDebug(explode(',', $csv), FILE_APPEND);

			$db->setColumns($params);
			if ($db->insert()) {
				$response = ['status' => true];
			} else {
				$response = ['status' => false];
			}
			$db->clearColumns();
		}
	}

$db->commit();

/**
 * 出力
 */

UtilsClass::jsonOutput($response);