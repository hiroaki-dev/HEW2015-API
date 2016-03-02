<?php
/**
 * Created by PhpStorm.
 * User: hiroaki
 * Date: 2016/03/01
 * Time: 17:03
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
$db = new PdoWrapper('localhost', 'hew', 'root', '');
$db->setTable('booth_master');
$booth_masters = $db->getTargetList("event_id = '". $event_id."' AND category_line_num = ". $line_num);
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
}
$output = [
	'booths'=>$booth
];

UtilsClass::jsonOutput($output);