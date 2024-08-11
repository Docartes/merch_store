<?php 

$root_dir = dirname(__DIR__); 
include $root_dir . '/connection/connection.php';

function decrypt_password($password) {
	global $env;

	$key = $env['secret_key'];
	$chiper = $env['chiper'];
	$option = $env['option'];
	$decrypt_password = openssl_decrypt(base64_decode($password), $chiper, $key, $option); 

	return $decrypt_password;
}


function login($username, $password) {
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM account_management");

	while ( $row = mysqli_fetch_assoc($data) ) {
		if ( $row['username'] == htmlspecialchars($username) && decrypt_password($row['password']) == htmlspecialchars($password) ) {
			return true;
		}
	}

	return false;
}