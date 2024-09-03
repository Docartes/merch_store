<<<<<<< HEAD
<?php  
 
include 'connection/connection.php';

function check_duplicate_product($product_name) {
=======
<?php
$root_dir = dirname(__DIR__);

include 'connection/connection.php';
include_once $root_dir . './../utils/uuid.php';
function check_duplicate_product($product_name)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$data = mysqli_query($conn, "SELECT * FROM products");

<<<<<<< HEAD
	while ( $row = mysqli_fetch_assoc($data) ) {
		if ( $row['name'] == htmlentities($product_name) ) {
=======
	while ($row = mysqli_fetch_assoc($data)) {
		if ($row['name'] == htmlentities($product_name)) {
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
			return true;
		}
	}

	return false;
}

<<<<<<< HEAD
function getProductsByLimit($limit) {
=======
function getProductsByLimit($limit)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "SELECT * FROM products LIMIT 3";

	$data = mysqli_query($conn, $query);

	return $data;
}


<<<<<<< HEAD
function readProducts() {
=======
function readProducts()
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "SELECT * FROM products";

	$data = mysqli_query($conn, $query);

	return $data;
}

<<<<<<< HEAD
function getProductByCategory($categoryId) {
=======
function getProductByCategory($categoryId)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "SELECT * FROM products WHERE categoryId = '$categoryId'";

	$data = mysqli_query($conn, $query);

	return $data;
}

<<<<<<< HEAD
function getProductById($id) {
=======
function getProductById($id)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "SELECT * FROM products WHERE id = '$id'";

	$data = mysqli_query($conn, $query);

	return $data;
}

<<<<<<< HEAD
function insertProducts($name, $images, $price, $quantity_in_stock, $categoryId) {
	global $conn;

	$query = "INSERT INTO products (name, images, price, quantity_in_stock, categoryId) VALUES ('$name', '$images', $price, $quantity_in_stock, '$categoryId')";

	if ( check_duplicate_product($name) == true ) {
=======
function insertProducts($name, $images, $price, $quantity_in_stock, $categoryId)
{
	global $conn;
	$id = generateUuid();

	$query = "INSERT INTO products (id, name, images, price, quantity_in_stock, categoryId) VALUES ('$id', '$name', '$images', $price, $quantity_in_stock, '$categoryId')";

	if (check_duplicate_product($name) == true) {
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
		return "Produk sudah terdaftar";
	}

	return mysqli_query($conn, $query);
}

<<<<<<< HEAD
function updateProducts($id, $name, $images, $price, $quantity_in_stock, $categoryId) {
=======
function updateProducts($id, $name, $images, $price, $quantity_in_stock, $categoryId)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "UPDATE products SET name = '$name', images = '$images', price = $price, quantity_in_stock = $quantity_in_stock, categoryId = '$categoryId' WHERE id = '$id'";

	return mysqli_query($conn, $query);
}

<<<<<<< HEAD
function deleteProducts($id) {
=======
function deleteProducts($id)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "DELETE FROM products WHERE id = '$id'";

	return mysqli_query($conn, $query);
<<<<<<< HEAD
}
=======
}
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
