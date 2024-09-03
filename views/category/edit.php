<?php  

session_start();

include "../bootstrap/bootstrap.php";


if ( isset($_SESSION['login']) || isset($_SESSION['data_login']) ) {	
	$login = $_SESSION['login'];
	$user_data = $_SESSION['data_login'];
}


if ( isset($login) && $user_data['role'] == 'user' ) {
	header('Location: ../home');
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
	<?php if ( isset($login) && $user_data['role'] == 'user' ): ?>
		<?php echo $navbar['login_user']; ?>
		<?php header('Location: ../home'); ?>
	<?php endif; ?>

	<?php if ( isset($login) && $user_data['role'] == 'admin' ): ?>
		<?php echo $navbar['login_admin']; ?>
	<?php endif; ?>

	<?php if ( isset($login) !== true ): ?>
		<?php echo $navbar['not_login']; ?>
		<?php header('Location: ../home'); ?>
	<?php endif; ?>

	<?php include '../../controllers/category.controller.php' ?>
	<?php $data = getCategoryById($_GET['id']); ?>
	<?php $name = mysqli_fetch_assoc($data); ?>
	
	<div class="d-flex flex-column justify-content-center align-items-center mt-4">
		<h1>Edit Category</h1>
		<form action="../../controllers/category.controller.php?id=<?php echo $name['id']; ?>" class="mt-4  row g-2" method="post">
			<input type="text" class="form-control" name="category" required autocomplete="off" value="<?php echo $name['name']; ?>">
			<br>
			<button type="submit" class="btn btn-primary">Edit</button>
			<a href="../dashboard" class="btn btn-secondary">Cancel</a>
		</form>
	</div>

	<?php echo $script; ?>
</body>
</html>