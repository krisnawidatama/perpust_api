<?php
header('Content-Type: application/json');

require_once ("../../lib/Db.class.php");

$db = new Db();

$id = filter_input(INPUT_GET, 'id');

$cat_detail = $db->row("SELECT * FROM staff WHERE idstaff=".$id);
$cat_detail2 = $db->row("SELECT * FROM login WHERE idstaff=".$id);

$arr = array();
$arr['info'] = 'success';
$arr['result'] = $cat_detail;
$arr['result2'] = $cat_detail2;
echo json_encode($arr);