<?php  
session_start();

include "../bootstrap/bootstrap.php";

$error_message = $_SESSION['error'];
$success_message = $_GET['status'];
$failed_message = $_SESSION['failed'];
$duplicate_message = $_SESSION['duplicate'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $css; ?>
	<title>Register Page</title>
</head>
<body>

	<div class="d-flex flex-column justify-content-center align-items-center" style="font-family: Karla;">
		<h1 class="text-center my-4">Register Page</h1>
		<form action="../../controllers/register.controller.php" method="post" class="mx-4 row g-2">
			<input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off">
			<br>
			<input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="off">
			<br>
			<input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
			<br>
			<button type="submit" class="btn btn-primary">Register</button>
			<p class="text-center">Have an account? <a href="login.php">Login</a></p>
		</form>

		<?php if (isset($failed_message)): ?>
			<div class="alert alert-danger" style="font-family: Karla;" role="alert">
  			<?php echo $failed_message; ?>
			</div>
			<?php session_destroy(); ?>
		<?php endif; ?>

		<?php if (isset($duplicate_message)): ?>
			<div class="alert alert-danger" style="font-family: Karla;" role="alert">
  			<?php echo $duplicate_message; ?>
			</div>
			<?php session_destroy(); ?>
		<?php endif; ?>

		<?php if (isset($error_message)): ?>
			<div class="alert alert-danger" style="font-family: Karla;" role="alert">
	  		<?php echo $error_message; ?>
			</div>
			<?php session_destroy(); ?>
		<?php endif; ?>

		<?php if (isset($success_message)): ?>
			<div class="alert alert-success" style="font-family: Karla;" role="alert">
	  		<?php echo $success_message; ?>
			</div>
			<?php session_destroy(); ?>
		<?php endif; ?>
	</div>



	<?php echo $script; ?>
	
</body>
</html>