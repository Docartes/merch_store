<?php  

session_start();

include "../bootstrap/bootstrap.php";
include "../../controllers/product.controller.php";

if ( isset($_SESSION['login']) || isset($_SESSION['data_login']) ) {	
	$login = $_SESSION['login'];
	$user_data = $_SESSION['data_login'];
}

if ( isset($_GET['id']) ) {
	$rawData = getProductByCategory($_GET['id']);
} else if ( !isset($_GET['id']) ) {
	$rawData = readProducts();
}

 

function formatRupiah($number) {
    return 'Rp' . number_format($number, 0, ',', '.');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shop</title>
	<?php echo $css; ?>
</head>
<body style="font-family: Karla;">

	<?php if ( isset($login) && $user_data['role'] == 'user' ): ?>
		<?php echo $navbar['login_user']; ?>
	<?php endif; ?>

	<?php if ( isset($login) && $user_data['role'] == 'admin' ): ?>
		<?php echo $navbar['login_admin']; ?>
	<?php endif; ?>

	<?php if ( isset($login) !== true ): ?>
		<?php echo $navbar['not_login']; ?>
	<?php endif; ?>

	
	<?php include "../../controllers/category.controller.php"; ?>
	<div class="container mt-4">
		<div class="flex">
			<?php while ( $row = mysqli_fetch_assoc($data) ): ?>
				<a href="index.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><?php echo $row['name']; ?></a>
			<?php endwhile; ?>
		</div>
	</div>

	<div class="untree_co-section product-section before-footer-section">
		  <div class="container">
		      	<div class="row">
		      		<?php $data = $rawData; ?>
		      		<?php while ( $row = mysqli_fetch_assoc($data) ): ?>
								<div class="col-12 col-md-4 col-lg-3 mb-5">
									<a class="product-item" href="../cart/index.php?id=<?php echo $row['id']; ?>">
										<img src="<?php echo $row['images']; ?>" class="img-fluid product-thumbnail">
										<h3 class="product-title"><?php echo $row['name']; ?></h3>
										<strong class="product-price"><?php echo formatRupiah($row['price']); ?></strong>
										<span class="icon-cross">
												<img src="../images/cross.svg" class="img-fluid">
										</span>
									</a>
								</div> 
							<?php endwhile; ?>
		      	</div>
		  </div>
	</div>

	<footer class="footer-section">
			<div class="container relative">
				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="../images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Contact Us</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved.
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>

	<?php echo $script; ?>

	
</body>
</html>