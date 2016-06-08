<?php
/**
 * Created by PhpStorm.
 * User: hiroaki
 * Date: 2016/03/01
 * Time: 0:28
 */

require_once('../model/PdoWrapper.php');
require_once('../utils/UtilsClass.php');


/**
 * 値受け取り処理
 */
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (empty($_GET)) 	UtilsClass::error();
	foreach ($_GET as $index => $value) {
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
// 対象イベント検索
$db = new PdoWrapper('localhost', 'hew', 'hew_admin', '');
$db->setTable('
	student_master sm
	INNER JOIN affiliation_master am
	ON sm.id = am.student_id
	INNER JOIN class_master cm
	ON am.class_id = cm.id
	INNER JOIN target_table tt
	ON cm.id = tt.class_id
	INNER JOIN EVENT_MASTER EM
	ON tt.event_id = EM.id'
);

$event_masters = $db->getTargetList("sm.id = '".$id."'", "EM.*");


// イベント詳細検索
$event = [];
foreach($event_masters as $event_master) {

	$db->setTable('category_master');
	$category_masters = $db->getTargetList("event_id = ". $event_master['id']);

	$event_category = [];
	$category = [];
	foreach($category_masters as $category_master) {

		$db->setTable('event_category_master');
		$event_category_master = $db->getTargetList("id = ".$category_master['event_category_id'])[0];

		$db->setTable('questionnaire_master');
		$questionnaire_masters = $db->getTargetList("event_category_id = ". $event_category_master['id']);
		$questionnaire = [];
		foreach($questionnaire_masters as $questionnaire_master) {
			$questionnaire[] = [
				'id'=>$questionnaire_master['event_category_id'].'_'.$questionnaire_master['line_num'],
				'event_category_id'=>$questionnaire_master['event_category_id'],
				'line_num'=>$questionnaire_master['line_num'],
				'content'=>$questionnaire_master['content'],
				'choice1'=>$questionnaire_master['choice1'],
				'choice2'=>$questionnaire_master['choice2'],
				'choice3'=>$questionnaire_master['choice3'],
				'choice4'=>$questionnaire_master['choice4'],
				'choice5'=>$questionnaire_master['choice5']
			];
		}
		$question_flag = empty($questionnaire) ? false : true;


		$db->setTable('booth_master');
		$booth_masters = $db->getTargetList("event_id = '". $category_master['event_id']."' AND category_line_num = ". $category_master['line_num']);

		if (mb_strlen($booth_masters[0]['subject_id']) == 4) {
			$db->setTable('booth_master bm
				INNER JOIN subject_master sm
				ON bm.subject_id = sm.id
				INNER JOIN attend_table at
				ON sm.id = at.subject_id'
			);
			$booth_masters = $db->getTargetList(
				"event_id = '". $category_master['event_id']."' AND category_line_num = ". $category_master['line_num']." AND at.student_id = '".$id."'",
				"bm.id, bm.name, bm.description, bm.good"
			);
		}
		$booth = [];
		foreach($booth_masters as $booth_master) {
			$db->setTable('grouping_table gt
				INNER JOIN student_master sm
				ON gt.id = sm.id'
			);
			$db->setOrder("gt.leader_flag", "desc");
			$members = $db->getTargetList("gt.booth_id = '". $booth_master['id']. "'");
			if (empty($members)) {

				$db->setTable('booth_responsible_table brt
					INNER JOIN teacher_master tm
					ON brt.teacher_id = tm.id'
				);
				$teacher = $db->getTargetList("brt.booth_id = '". $booth_master['id']."'");
				if (empty($teacher)) {
					$representative = "なし";
				} else {
					$representative = $teacher[0]['name'];
				}


			} else {
				if(count($members) > 1) {
					$representative = implode(array_column($members, 'name'), ",");
				} else {
					$representative = $members[0]['name'];
				}
			}


			$booth[] = [
				'id'=>$booth_master['id'],
				'name'=>$booth_master['name'],
				'description'=>$booth_master['description'],
				'representative'=>$representative,
				'good'=>$booth_master['good']
			];
			$good_flag = $booth_master['good'] == -1 ? false : true;
		}


		$event_category = [
			'id'=>$event_category_master['id'],
			'name'=>$event_category_master['name'],
			'opinion_flag'=>$event_category_master['opinion_flag'] == "0" ? false : true,
			'check_flag'=>$event_category_master['check_flag'] == "0" ? false :true,
			'good_flag'=>$good_flag,
			'question_flag'=>$question_flag,
			'questionnaire'=>$questionnaire
		];


		$category[] = [
			'id'=>$category_master['event_id'].'_'.$category_master['line_num'],
			'event_category'=>$event_category,
			'booths'=>$booth
		];
	}



	$event[] = [
		'id'=>$event_master['id'],
		'name'=>$event_master['name'],
		'start'=>$event_master['start'],
		'end'=>$event_master['end'],
		'detail'=>$event_master['detail'],
		'category'=>$category
	];



}

$output = [
	'events'=>$event
];

/**
 * 出力
 */
UtilsClass::jsonOutput($output);
