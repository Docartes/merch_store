<<<<<<< HEAD
<?php  
 
include 'connection/connection.php';

function check_duplicate_category($category_name) {
=======
<?php
$root_dir = dirname(__DIR__);

include 'connection/connection.php';
include_once $root_dir . './../utils/uuid.php';

function check_duplicate_category($category_name)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$data = mysqli_query($conn, "SELECT * FROM category");

<<<<<<< HEAD
	while ( $row = mysqli_fetch_assoc($data) ) {
		if ( $row['name'] == htmlentities($category_name) ) {
=======
	while ($row = mysqli_fetch_assoc($data)) {
		if ($row['name'] == htmlentities($category_name)) {
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
			return true;
		}
	}

	return false;
}

<<<<<<< HEAD
function getCategoryById($id) {
=======
function getCategoryById($id)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "SELECT * FROM category WHERE id = '$id'";

	$data = mysqli_query($conn, $query);

<<<<<<< HEAD
	return $data;  
}  

function readCategory() {
=======
	return $data;
}

function readCategory()
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$data = mysqli_query($conn, "SELECT * FROM category");

	return $data;
}

<<<<<<< HEAD
function insertCategory($category_name) {
	global $conn;
	$category_name = htmlspecialchars($category_name);

	$query = "INSERT INTO category (name) VALUES ('$category_name')";

	if ( gettype($category_name) == "integer" ) {
		return 'Masukkan nama yang valid';
	}

	if ( check_duplicate_category($category_name) == true ) {
=======
function insertCategory($category_name)
{
	global $conn;
	$category_name = htmlspecialchars($category_name);
	$id = generateUuid();

	$query = "INSERT INTO category (id, name) VALUES ('$id', '$category_name')";

	if (gettype($category_name) == "integer") {
		return 'Masukkan nama yang valid';
	}

	if (check_duplicate_category($category_name) == true) {
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
		return "Kategori sudah ada";
	}

	return mysqli_query($conn, $query);
}

<<<<<<< HEAD
function deleteCategory($id) {
=======
function deleteCategory($id)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "DELETE FROM category WHERE id = '$id'";

	return mysqli_query($conn, $query);
}

<<<<<<< HEAD
function updateCategory($id, $category_name) {
=======
function updateCategory($id, $category_name)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$category_name = htmlspecialchars($category_name);

	$query = "UPDATE category SET name = '$category_name' WHERE id = '$id'";

<<<<<<< HEAD
	if ( gettype($category_name) == "integer" ) {
		return 'Masukkan nama yang valid';
	}

	return mysqli_query($conn, $query);  
=======
	if (gettype($category_name) == "integer") {
		return 'Masukkan nama yang valid';
	}

	return mysqli_query($conn, $query);
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
}
