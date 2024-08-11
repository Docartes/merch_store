<?php  

session_start();

$error_message = $_SESSION['error'];
$success_message = $_SESSION['succes'];
$failed_message = $_SESSION['failed'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
	<title>Login Page</title>
</head>
<body>

	<div class="d-flex flex-column justify-content-center align-items-center" style="font-family: Karla;">
		<h1 class="text-center mt-4">Login Page</h1>
		<form action="../../controllers/auth.controller.php" method="post" class="w-50 row g-2">
			<input type="text" name="username" class="form-control" placeholder="Username" required>
			<br>
			<input type="password" name="password" class="form-control" placeholder="Passowrd" required>
			<br>
			<button type="submit" class="btn btn-primary">login</button>
		</form>
	</div>

	<?php if (isset($error_message)): ?>
		<p class="text-center mt-4 text-danger" style="font-family: Karla;"><?php echo $error_message; ?></p>
		<?php session_destroy(); ?>
	<?php endif; ?>

	<?php if (isset($success_message)): ?>
		<p class="text-center mt-4 text-success" style="font-family: Karla;"><?php echo $success_message; ?></p>
		<?php session_destroy(); ?>
	<?php endif; ?>

	<?php if (isset($failed_message)): ?>
		<p class="text-center mt-4 text-danger" style="font-family: Karla;"><?php echo $failed_message; ?></p>
		<?php session_destroy(); ?>
	<?php endif; ?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

	
</body>
</html>