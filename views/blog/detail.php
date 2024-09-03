<?php  
session_start();

include '../bootstrap/bootstrap.php';
include_once '../../controllers/blog.controller.php';

if (isset($_SESSION['login']) || isset($_SESSION['data_login'])) {
  $login = $_SESSION['login'];
  $user_data = $_SESSION['data_login'];
}

if ( !isset($_GET['id']) ) {
	header("Location: ../blog");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php $rawData = getBlogById($_GET['id']); ?>
	<?php $data = mysqli_fetch_assoc($rawData); ?>
	<title><?php echo $data['title'] ?></title>
	<?php echo $css; ?>
</head>
<body>

	<?php if (isset($login) && $user_data['role'] == 'user'): ?>
    <?php echo $navbar['login_user']; ?>
  <?php endif; ?>

  <?php if (isset($login) && $user_data['role'] == 'admin'): ?>
    <?php echo $navbar['login_admin']; ?>
  <?php endif; ?>

  <?php if (isset($login) !== true): ?>
    <?php echo $navbar['not_login']; ?>
  <?php endif; ?>

  <img src="<?php echo $data['image'] ?>" alt="">
  <h1><?php echo $data['title']; ?></h1>
  <p><?php echo $data['content']; ?></p>

  <a href="../blog">back</a>
	
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>
</html>