<?php

header('Content-Type: application/json');

require_once ("../../lib/Db.class.php");

$db = new Db();
$datas = array();
$datasx = array();
$id_staff = filter_input(INPUT_POST, 'id_staff');
$user_name = filter_input(INPUT_POST, 'user_name');

$name = filter_input(INPUT_POST, 'nama');
$address = filter_input(INPUT_POST, 'address');
$email = filter_input(INPUT_POST, 'e_mail');
$tel = filter_input(INPUT_POST, 'ph_number');

$datas['name'] = $name;
$datas['address'] = $address;
$datas['email'] = $email;
$datas['telp'] = $tel;

$exec_staff = $db->update('staff', $datas, ' WHERE idstaff=' . $id_staff);
$datasx['username'] = $user_name;
if (!empty(filter_input(INPUT_POST, 'pass_word'))) {
    $pass_word = sha1(filter_input(INPUT_POST, 'pass_word'));
    $datasx['password'] = $pass_word;
}
$exec_login = $db->update('login', $datasx, ' WHERE idstaff=' . $id_staff);

$arr = array();
$arr['info'] = 'Success';
$arr['msg'] = 'Data Has Been Changed!';
echo json_encode($arr);
