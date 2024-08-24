<?php  
 
include 'connection/connection.php';

function check_duplicate_product($product_name) {
	global $conn;

	$data = mysqli_query($conn, "SELECT * FROM products");

	while ( $row = mysqli_fetch_assoc($data) ) {
		if ( $row['name'] == htmlentities($product_name) ) {
			return true;
		}
	}

	return false;
}


function readProducts() {
	global $conn;

	$query = "SELECT * FROM products";

	$data = mysqli_query($conn, $query);

	return $data;
}

function getProductByCategory($categoryId) {
	global $conn;

	$query = "SELECT * FROM products WHERE categoryId = '$categoryId'";

	$data = mysqli_query($conn, $query);

	return $data;
}

function getProductById($id) {
	global $conn;

	$query = "SELECT * FROM products WHERE id = '$id'";

	$data = mysqli_query($conn, $query);

	return $data;
}

function insertProducts($name, $images, $price, $quantity_in_stock, $categoryId) {
	global $conn;

	$query = "INSERT INTO products (name, images, price, quantity_in_stock, categoryId) VALUES ('$name', '$images', $price, $quantity_in_stock, '$categoryId')";

	if ( check_duplicate_product($name) == true ) {
		return "Produk sudah terdaftar";
	}

	return mysqli_query($conn, $query);
}

function updateProducts($id, $name, $images, $price, $quantity_in_stock, $categoryId) {
	global $conn;

	$query = "UPDATE products SET name = '$name', images = '$images', price = $price, quantity_in_stock = $quantity_in_stock, categoryId = '$categoryId' WHERE id = '$id'";

	return mysqli_query($conn, $query);
}

function deleteProducts($id) {
	global $conn;

	$query = "DELETE FROM products WHERE id = '$id'";

	return mysqli_query($conn, $query);
}