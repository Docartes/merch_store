<?php  

$root_dir = dirname(__DIR__);

include $root_dir . "/model/product.service.php";

$data = readProducts();

if ( isset($_POST['productName']) ) {
	$name = htmlspecialchars($_POST['productName']);
	$image = htmlspecialchars($_POST['productImage']);
	$price = (int)$_POST['productPrice'];
	$stok = (int)$_POST['stok'];
	$categoryId = $_POST['category'];


	insertProducts($name, $image, $price, $stok, $categoryId);
	header("Location: ../views/dashboard");
}



