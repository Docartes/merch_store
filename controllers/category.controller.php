<?php  

$root_dir = dirname(__DIR__);
include $root_dir . "/model/category.service.php";

$data = readCategory();

if ( isset($_POST['name']) ) {
	insertCategory($_POST['name']);
	header("Location: ../views/category/category.php");
}
