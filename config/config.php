<?php

$siteinfo = array(
    "_site_name_" => "Sistem Informasi Perpustakaan (Test Web)",
    "_site_url_" => "localhost/perpus",
    "_db_host_" => "localhost",
    "_db_user_" => "root",
    "_db_pass_" => "root",
    "_db_name_" => "perpus"
);
$dbcon = new PDO("mysql:host=" . $siteinfo['_db_host_'] . ";dbname=" . $siteinfo['_db_name_'] . "", "" . $siteinfo['_db_user_'] . "", "" . $siteinfo['_db_pass_'] . "");
?>