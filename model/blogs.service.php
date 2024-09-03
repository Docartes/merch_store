<<<<<<< HEAD
<?php  
include 'connection/connection.php';

function check_duplicate_blogs($blog_title) {
=======
<?php
$root_dir = dirname(__DIR__);

include 'connection/connection.php';
include_once $root_dir . './../utils/uuid.php';

function check_duplicate_blogs($blog_title)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$data = mysqli_query($conn, "SELECT * FROM blogs");

<<<<<<< HEAD
	while ( $row = mysqli_fetch_assoc($data) ) {
		if ( $row['title'] == htmlentities($blog_title) ) {
=======
	while ($row = mysqli_fetch_assoc($data)) {
		if ($row['title'] == htmlentities($blog_title)) {
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
			return true;
		}
	}

	return false;
}

<<<<<<< HEAD
function readBlogs() {
=======
function readBlogs()
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "SELECT * FROM blogs";

	$data = mysqli_query($conn, $query);

	return $data;
}

<<<<<<< HEAD
function insertBlogs($title, $content, $userId) {
=======
function insertBlogs($title, $content, $userId)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "INSERT INTO blogs (title, content, userId) VALUES ('$title', '$content', '$userId')";

<<<<<<< HEAD
	if ( check_duplicate_blogs($title) == true ) {
=======
	if (check_duplicate_blogs($title) == true) {
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
		return 'Blog sudah terdaftar';
	}

	return mysqli_query($conn, $query);
}

<<<<<<< HEAD
function updateBlogs($id, $title, $content,$userId) {
=======
function updateBlogs($id, $title, $content, $userId)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "UPDATE blogs SET title = '$title', content = '$content', userId = '$userId' WHERE id = '$id'";

	return mysqli_query($conn, $query);
}

<<<<<<< HEAD
function deleteBogs($id) {
=======
function deleteBogs($id)
{
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	global $conn;

	$query = "DELETE FROM blogs WHERE id = '$id'";

	return mysqli_query($conn, $query);
<<<<<<< HEAD
}
=======
}
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
