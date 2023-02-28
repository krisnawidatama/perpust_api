<?php

header('Content-Type: application/json');
require_once ("../../lib/Db.class.php");
require_once ("../../config/config.php");

$db = new Db();

$datas = array();
$datasx = array();
$user_name = filter_input(INPUT_POST, 'user_name');
$pass_word = sha1(filter_input(INPUT_POST, 'pass_word'));
$name = filter_input(INPUT_POST, 'nama');
$address = filter_input(INPUT_POST, 'address');
$email = filter_input(INPUT_POST, 'e_mail');
$tel = filter_input(INPUT_POST, 'ph_number');

$datas['name'] = $name;
$datas['address'] = $address;
$datas['email'] = $email;
$datas['telp'] = $tel;

$exec_staff = $db->insert('staff', $datas);

if (!$exec_staff) {
    $arr = array();
    $arr['info'] = 'Error';
    $arr['msg'] = 'Staff Table Query Error!';
    echo json_encode($arr);
    exit();
} else {
    $id_staff = "";
    $dbcon = new PDO("mysql:host=" . $siteinfo['_db_host_'] . ";dbname=" . $siteinfo['_db_name_'] . "", "" . $siteinfo['_db_user_'] . "", "" . $siteinfo['_db_pass_'] . "");
    $stmt2 = $dbcon->prepare("SELECT * FROM staff ORDER BY idstaff DESC LIMIT 0,1");
    $stmt2->execute();
    while ($rowset2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $id_staff = $rowset2['idstaff'];
    }
    $datasx['idstaff'] = $id_staff;
    $datasx['username'] = $user_name;
    $datasx['password'] = $pass_word;
    $datasx['status'] = "Staff";

    $exec_login = $db->insert('login', $datasx);

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


