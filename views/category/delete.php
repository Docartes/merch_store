<?php 

session_start();

include "../../controllers/category.controller.php";

if ( isset($login) && $user_data['role'] == 'user' ) {
	header('Location: ../home');
}

deleteCategory($_GET['id']);
header("Location: ../dashboard");
