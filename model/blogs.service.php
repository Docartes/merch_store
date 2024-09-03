<?php
$root_dir = dirname(__DIR__);

include 'connection/connection.php';
include_once $root_dir . './../utils/uuid.php';

function check_duplicate_blogs($blog_title)
{
	global $conn;

	$data = mysqli_query($conn, "SELECT * FROM blogs");

	while ($row = mysqli_fetch_assoc($data)) {
		if ($row['title'] == htmlentities($blog_title)) {
			return true;
		}
	}

	return false;
}

function readBlogs()
{
	global $conn;

	$query = "SELECT * FROM blogs";

	$data = mysqli_query($conn, $query);

	return $data;
}

function insertBlogs($title, $content, $userId)
{
	global $conn;

	$query = "INSERT INTO blogs (title, content, userId) VALUES ('$title', '$content', '$userId')";

	if (check_duplicate_blogs($title) == true) {
		return 'Blog sudah terdaftar';
	}

	return mysqli_query($conn, $query);
}

function updateBlogs($id, $title, $content, $userId)
{
	global $conn;

	$query = "UPDATE blogs SET title = '$title', content = '$content', userId = '$userId' WHERE id = '$id'";

	return mysqli_query($conn, $query);
}

function deleteBogs($id)
{
	global $conn;

	$query = "DELETE FROM blogs WHERE id = '$id'";

	return mysqli_query($conn, $query);
}
