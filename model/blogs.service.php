<?php
$root_dir = dirname(__DIR__);

include_once $root_dir . '/utils/uuid.php';
include 'connection/connection.php';

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

function getBlogById($id)
{
	global $conn;

	$query = "SELECT * FROM blogs WHERE id = '$id'";

	$data = mysqli_query($conn, $query);

	return $data;
}

function getBlogsByLimit($limit)
{
	global $conn;

	$query = "SELECT * FROM blogs LIMIT 3";


	$data = mysqli_query($conn, $query);

	return $data;
}

function insertBlogs($title, $image, $content, $userId)
{
	global $conn;
	$id = generateUuid();
	$query = "INSERT INTO blogs (id, image, title, content, userId) VALUES ('$id', '$image', '$title', '$content', '$userId')";

	if (check_duplicate_blogs($title) == true) {
		return 'Blog sudah terdaftar';
	}

	return mysqli_query($conn, $query);
}

function updateBlogs($id, $image, $title, $content, $userId)
{
	global $conn;

	$query = "UPDATE blogs SET image = '$image', title = '$title', content = '$content', userId = '$userId' WHERE id = '$id'";

	return mysqli_query($conn, $query);
}

function deleteBlog($id)
{
	global $conn;

	$query = "DELETE FROM blogs WHERE id = '$id'";

	return mysqli_query($conn, $query);
}
