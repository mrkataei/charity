<?php
session_start();
date_default_timezone_set("Asia/Tehran");
require_once("inc/db.php");
require_once('functions.php');
require_once('definitions.php');
define('STATIC_ROOT', 'http://localhost/charity/static');
define('ROOT_URL', 'http://localhost/charity');
define('LOGIN_URL', ROOT_URL.'/auth/login.php');
?>
