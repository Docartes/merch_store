<?php

$root_dir = dirname(__DIR__);

include_once $root_dir . "/utils/uuid.php";
include 'connection/connection.php';

function check_duplicate_category($category_name)
{
	global $conn;

	$data = mysqli_query($conn, "SELECT * FROM category");

	while ($row = mysqli_fetch_assoc($data)) {
		if ($row['name'] == htmlentities($category_name)) {
			return true;
		}
	}

	return false;
}

function getCategoryById($id)
{
	global $conn;

	$query = "SELECT * FROM category WHERE id = '$id'";

	$data = mysqli_query($conn, $query);

	return $data;
}

function readCategory()
{
	global $conn;

	$data = mysqli_query($conn, "SELECT * FROM category");

	return $data;
}

function insertCategory($category_name)
{
	global $conn;
	$id = generateUuid();
	$category_name = htmlspecialchars($category_name);

	$query = "INSERT INTO category (id, name) VALUES ('$id', '$category_name')";

	if (gettype($category_name) == "integer") {
		return 'Masukkan nama yang valid';
	}

	if (check_duplicate_category($category_name) == true) {
		return "Kategori sudah ada";
	}

	return mysqli_query($conn, $query);
}

function deleteCategory($id)
{
	global $conn;

	$query = "DELETE FROM category WHERE id = '$id'";

	return mysqli_query($conn, $query);
}

function updateCategory($id, $category_name)
{
	global $conn;

	$category_name = htmlspecialchars($category_name);

	$query = "UPDATE category SET name = '$category_name' WHERE id = '$id'";

	if (gettype($category_name) == "integer") {
		return 'Masukkan nama yang valid';
	}

	return mysqli_query($conn, $query);
}
