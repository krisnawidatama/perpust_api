<?php 
session_start();
require_once("config/config.php");
session_unset();
session_destroy();
header("location:http://".$siteinfo['_site_url_']."");
?>