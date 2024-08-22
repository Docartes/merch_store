<?php  

include "../bootstrap/bootstrap.php";
include_once "../../controllers/category.controller.php";


if ( isset($_POST['categoryName']) ) {
	$name = htmlspecialchars($_POST['categoryName']);
	$id = $_GET['id'];
	updateCategory($id, $name);

	header("Location: ../dashboard");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $css; ?>
	<title>Edit Category</title>
</head>
<body style="font-family: Karla;">
	
	<?php $data = getCategoryById($_GET['id']); ?>
	<?php $name = mysqli_fetch_assoc($data); ?>
	
	<div class="d-flex flex-column justify-content-center align-items-center mt-4">
		<h1>Edit Category</h1>
		<form action="edit.php" class="mt-4  row g-2" method="post">
			<input type="text" class="form-control" name="categoryName" required autocomplete="off" value="<?php echo $name['name']; ?>">
			<br>
			<button type="submit" class="btn btn-primary">Edit</button>
			<a href="../dashboard" class="btn btn-secondary">Cancel</a>
		</form>
	</div>

	<?php echo $script; ?>
</body>
</html>