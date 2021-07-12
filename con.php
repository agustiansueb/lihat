<?php
ob_start();
session_start();
define('DBHOST','localhost');
define('DBUSER','u0_a192');
define('DBPASS','');
define('DBNAME','lihat');
$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
date_default_timezone_set('Asia/Jakarta');
?>
