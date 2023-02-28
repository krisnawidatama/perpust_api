<?php

header('Content-Type: application/json');
require_once ("../../lib/Db.class.php");
require_once ("../../config/config.php");

$db = new Db();

$datas = array();
$datasx = array();
$user_name = filter_input(INPUT_POST, 'user_name');
$pass_word = sha1(filter_input(INPUT_POST, 'pass_word'));
$uid = filter_input(INPUT_POST, 'uid');
$name = filter_input(INPUT_POST, 'nama');
$address = filter_input(INPUT_POST, 'address');
$tel = filter_input(INPUT_POST, 'ph_number');

$datas['uid'] = $uid;
$datas['nama'] = $name;
$datas['address'] = $address;
$datas['phone_number'] = $tel;

$exec_student = $db->insert('students', $datas);

if (!$exec_student) {
    $arr = array();
    $arr['info'] = 'Error';
    $arr['msg'] = 'Students Table Query Error!';
    echo json_encode($arr);
    exit();
} else {
    $id_student = "";
    $dbcon = new PDO("mysql:host=" . $siteinfo['_db_host_'] . ";dbname=" . $siteinfo['_db_name_'] . "", "" . $siteinfo['_db_user_'] . "", "" . $siteinfo['_db_pass_'] . "");
    $stmt2 = $dbcon->prepare("SELECT * FROM students ORDER BY idstudent DESC LIMIT 0,1");
    $stmt2->execute();
    while ($rowset2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $id_student = $rowset2['idstudent'];
    }
    $datasx['idstudent'] = $id_student;
    $datasx['username'] = $user_name;
    $datasx['password'] = $pass_word;
    $datasx['status'] = "Student";

    $exec_login = $db->insert('login2', $datasx);

    if (!$exec_login) {
        $arr = array();
        $arr['info'] = 'Error';
        $arr['msg'] = 'Login Table Query Error!';
        echo json_encode($arr);
        exit();
    } else {
        $arr = array();
        $arr['info'] = 'Success';
        $arr['msg'] = 'Data Has Been Saved!';
        echo json_encode($arr);
    }
}


