<?php  
$root_dir = dirname(__DIR__);
include_once $root_dir . '/model/blogs.service.php';

if ( isset($_POST['title']) ) {
	$title = htmlspecialchars($_POST['title']);
	$image = htmlspecialchars($_POST['image']);
	$content = htmlspecialchars($_POST['content']);

	insertBlogs($title, $image, $content, $_POST['userId']);

	header('Location: ../views/dashboard');
}
