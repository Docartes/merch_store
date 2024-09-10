<?php  
session_start();

if (isset($_SESSION['login']) || isset($_SESSION['data_login'])) {
  $login = $_SESSION['login'];
  $user_data = $_SESSION['data_login'];
}

if ( isset($_GET['id']) ) {
	session_destroy();
	session_unset();
	header("Location: ../auth_views/login.php");
	exit();
}