<?php
header('Content-Type: application/json');
require_once ("../../lib/Db.class.php");
$db = new Db();
$id = filter_input(INPUT_POST, 'idstaff');
$db->query('DELETE FROM staff WHERE idstaff='.$id);
$arr = array();
$arr['info'] = 'Success';
$arr['msg'] = 'Data Has Been Deleted!';
echo json_encode($arr);