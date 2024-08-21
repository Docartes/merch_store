<?php  

session_start();

$login = $_SESSION['login'];
$user_data = $_SESSION['data_login'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include "../bootstrap/bootstrap.php"; ?>
	<?php echo $css; ?>
	<title>Profile - <?php echo $user_data['username']; ?></title>
</head>
<body style="font-family: Karla;">
	<?php if ( isset($login) && $user_data['role'] == 'user' ): ?>
		<?php echo $navbar['login_user']; ?>
	<?php endif; ?>

	<?php if ( isset($login) && $user_data['role'] == 'admin' ): ?>
		<?php echo $navbar['login_admin']; ?>
	<?php endif; ?>

	<?php if ( $login !== true ): ?>
		<?php header("Location: ../home/") ?>
	<?php endif; ?>


	<?php echo $script; ?>
</body>
</html>