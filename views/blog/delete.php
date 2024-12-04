<?php 


session_start();
include "../../controllers/blog.controller.php";


if ( isset($login) && $user_data['role'] == 'user' ) {
	header('Location: ../home');
}

if ( isset($_GET['id']) ) {
	deleteBlog($_GET['id']);

	header("Location: ../dashboard");
}
