<?php  

session_start();

include '../model/auth/register.php';

$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

if ( strlen($username) == 0 || strlen($email) == 0 || strlen($password) == 0 ) {
	$_SESSION['error'] = "Semua field harus diisi";
	header("Location: ../views/auth_views/register.php");
} else if ( register($username, $email, $password) == false ) {
	$_SESSION['duplicate'] = "Data sudah terdaftar";
	header("Location: ../views/auth_views/register.php");
} else if ( strlen($password) < 8 ) {
	$_SESSION['failed'] = "Password harus memiliki panjang 8 atau lebih karakter";
	header("Location: ../views/auth_views/register.php");
}