<?php  

$root_dir = dirname(__DIR__); 
include $root_dir . '/connection/connection.php';


function encrypt_password($password) {
	global $env;

	$key = $env['secret_key'];
	$chiper = $env['chiper'];
	$option = $env['option'];
	$hash_password = openssl_encrypt($password, $chiper, $key, $option);
	$encrypted_password = base64_encode($hash_password);

	return $encrypted_password;
}

function check_login($username, $email) {
	global $conn;

	$data = mysqli_query($conn, "SELECT * FROM account_management");

	while ($row = mysqli_fetch_assoc($data)) {
		if ( $row['username'] == $username || $row['email'] == $email ) {
			return true;
		}
	}

	return false;
}

function register($username, $email, $password) {
	global $conn;

	$username = htmlspecialchars($username);
	$email = htmlspecialchars($email);
	$password = htmlspecialchars($password);

	$encrypted_password = encrypt_password($password);

	if ( check_login($username, $email) == true ) {
		return "Username dan email sudah terdaftar";
	}

	if ( (strlen($password) >=  8) && (check_login($username, $email) == false) ) {
		mysqli_query($conn, "INSERT INTO account_management (username, email, password) VALUES('$username', '$email', '$encrypted_password')");

		return 'Register berhasil';
	}

	if ( strlen($password) < 8 ) {
		return "Panjang password minimal 8 karakter";
	}
}