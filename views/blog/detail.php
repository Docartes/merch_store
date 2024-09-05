<?php
session_start();

include '../bootstrap/bootstrap.php';
include_once '../../controllers/blog.controller.php';

if (isset($_SESSION['login']) || isset($_SESSION['data_login'])) {
  $login = $_SESSION['login'];
  $user_data = $_SESSION['data_login'];
}

if (!isset($_GET['id'])) {
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

<body style="font-family: Karla">

  <?php if (isset($login) && $user_data['role'] == 'user'): ?>
    <?php echo $navbar['login_user']; ?>
  <?php endif; ?>

  <?php if (isset($login) && $user_data['role'] == 'admin'): ?>
    <?php echo $navbar['login_admin']; ?>
  <?php endif; ?>

  <?php if (isset($login) !== true): ?>
    <?php echo $navbar['not_login']; ?>
  <?php endif; ?>

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <article>
          <h2 class="mb-3 mt-3"><?php echo $data['title']; ?></h2>
          <?php $formatDate = date('M d, Y', strtotime($data['created_at'])); ?>
          <p class="text-muted"><?php echo $formatDate; ?> Admin</p>

          <img src="<?php echo $data['image'] ?>" class="img-fluid mb-4" alt="Blog Image">

          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nulla vitae elit libero, a pharetra augue. Cras mattis consectetur purus sit amet fermentum.</p>

          <p>Curabitur blandit tempus porttitor. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>

          <p>Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
        </article>
      </div>
    </div>
  </div>

  <?php echo $footer; ?>
  <?php echo $script; ?>
</body>

</html>