<?php  

include "../bootstrap/bootstrap.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $css; ?>
	<title>Add Category</title>
</head>
<body style="font-family: Karla;">
	

	<div class="d-flex flex-column justify-content-center align-items-center mt-4">
		<h1>Add Category</h1>
		<form action="../../controllers/category.controller.php" class="mt-4  row g-2" method="post">
			<input type="text" class="form-control" name="name" required autocomplete="off" placeholder="Category Name">
			<br>
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>

	<?php echo $script; ?>
</body>
</html>