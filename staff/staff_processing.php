<?php

require_once ("../lib/Db.class.php");
require_once ("../config/config.php");

$url = $api_url . 'http://localhost/perpus/rest_api/staff/insert.php';
$user_name = filter_input(INPUT_POST, 'user_name');
$pass_word = filter_input(INPUT_POST, 'pass_word');
$name = filter_input(INPUT_POST, 'nama');
$address = filter_input(INPUT_POST, 'address');
$email = filter_input(INPUT_POST, 'e_mail');
$tel = filter_input(INPUT_POST, 'ph_number');
$postdata = array();
$postdata['nama'] = $name;
$postdata['address'] = $address;
$postdata['e_mail'] = $email;
$postdata['ph_number'] = $tel;
$postdata['user_name'] = $user_name;
$postdata['pass_word'] = $pass_word;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postdata, '', '&'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$response = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error = curl_error($ch);
curl_close($ch);
$arr_response = json_decode($response, true);
$info = isset($arr_response['info']) ? $arr_response['info'] : 'Error';
$msg = isset($arr_response['msg']) ? $arr_response['msg'] : 'Unknown Error';
header('location:staff.php?info=' . $info . '&msg=' . $msg);
exit();
