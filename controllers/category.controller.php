<?php  

$root_dir = dirname(__DIR__);
include $root_dir . "/model/category.service.php";

$data = readCategory();

if ( isset($_POST['name']) ) {
	insertCategory($_POST['name']);
	header("Location: ../views/dashboard");
}


if ( isset($_POST['category']) ) {
	$name = htmlspecialchars($_POST['category']);

	updateCategory($_GET['id'], $name);

	header("Location: ../views/dashboard");
}