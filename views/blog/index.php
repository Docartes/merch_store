<?php  

session_start();

include "../bootstrap/bootstrap.php";

if (isset($_SESSION['login']) || isset($_SESSION['data_login'])) {
  $login = $_SESSION['login'];
  $user_data = $_SESSION['data_login'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blogs</title>
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

	<div class="blog-section">
			<div class="container">
				
				<div class="row">
					<?php include_once '../../controllers/blog.controller.php'; ?>
					<?php $blogs = readBlogs(); ?>
					<?php while ( $row = mysqli_fetch_assoc($blogs) ): ?>
						<div class="col-12 col-sm-6 col-md-4 mb-5">
							<div class="post-entry">
								<a href="#" class="post-thumbnail"><img src="<?php echo $row['image'] ?>" alt="Image" class="img-fluid"></a>
								<div class="post-content-entry">
									<h3><a href="detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
									<div class="meta">
										<?php $formatDate = date('M d, Y', strtotime($row['created_at'])); ?>
										<span>by <a href="#">Admin</a></span> <span>on <a href="#"><?php echo $formatDate; ?></a></span>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>

	<?php echo $footer; ?>
	<?php echo $script; ?>
	
</body>
</html>