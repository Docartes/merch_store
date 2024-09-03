<?php  

session_start();

include "../bootstrap/bootstrap.php";

if ( isset($_SESSION['error']) || isset($_SESSION['failed']) ) {
<<<<<<< HEAD
	$error_message = $_SESSION['error'];
=======
	// $error_message = $_SESSION['error'];
>>>>>>> 31894f1fb223370b881ea15b8fbeef825ab56912
	$failed_message = $_SESSION['failed'];	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $css; ?>
	<title>Login Page</title>
</head>
<body style="font-family: Karla">

	<?php echo $navbar['not_login']; ?>

	<div class="d-flex flex-column justify-content-center align-items-center mt-4" style="font-family: Karla;">
		<h1 class="text-center my-4">Login Page</h1>
		<form action="../../controllers/login.controller.php" method="post" class="row g-2 mx-4">
			<input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="off">
			<br>
			<input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
			<br>
			<button type="submit" class="btn btn-primary">login</button>
			<p class="text-center">Don't have account? <a href="register.php">Register</a></p>
		</form>

		<?php if (isset($error_message)): ?>
			<div class="alert alert-danger" style="font-family: Karla;" role="alert">
	  		<?php echo $error_message ?>
			</div>
			<?php session_destroy(); ?>
		<?php endif; ?>

		<?php if (isset($failed_message)): ?>
			<div class="alert alert-danger" style="font-family: Karla;" role="alert">
	  		<?php echo $failed_message ?>
			</div>
			<?php session_destroy(); ?>
		<?php endif; ?>
	</div>

	<?php echo $script; ?>
	
</body>
</html>