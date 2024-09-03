<?php  

session_start();
include "../../controllers/product.controller.php";


if ( isset($login) && $user_data['role'] == 'user' ) {
	header('Location: ../home');
}




if ( $_SERVER['REQUEST_METHOD'] == "GET" ) {
	deleteProducts($_GET['id']);

	header("Location: ../dashboard");
}