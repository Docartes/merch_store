<?php 

session_start();

include '../model/auth/login.php';

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

if ( strlen($username) == 0 || strlen($password) == 0 ) {
	$_SESSION['error'] = "username dan password harus diisi";
	header("Location: ../views/auth_views/login.php");
}

if ( login($username, $password)  == false ) {
	$_SESSION['failed'] = "username atau password salah";
	header("Location: ../views/auth_views/login.php");
}

$login = login($username, $password);

if ( is_array($login) ) {
	$_SESSION['login'] = true;
	$_SESSION['data_login'] = $login;
	header("Location: ../views/home");
}