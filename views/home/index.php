<?php  

session_start();



if ( isset($_SESSION['login']) || isset($_SESSION['data_login']) ) {	
	$login = $_SESSION['login'];
	$user_data = $_SESSION['data_login'];
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
	<?php include "../bootstrap/bootstrap.php"; ?>
	<?php echo $css; ?>
	<title>Home</title>
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

		<!-- Start Hero Section -->
		<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Modern Marketplace <span clsas="d-block">For Merchandise Band</span></h1>
								<p class="mb-4">Temukan koleksi merchandise eksklusif dari band favorit Anda di sini, dari kaos hingga poster, untuk menunjukkan dukungan Anda dengan gaya.</p>
								<p><a href="" class="btn btn-secondary me-2" style="background: #545454; color: #fff;">BELI SEKARANG</a><a href="#" class="btn btn-white-outline">Jelajahi</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="../images/header.png" class="img-fluid" style="max-width: 100%;">
							</div>
						</div>
					</div>
				</div>
		</div>
		<!-- End Hero Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Kenapa Harus Kami?</h2>
						<p>Disini anda akan mendapatkan item eksklusif dan berkualitas tinggi yang tidak hanya mendukung band favorit Anda tetapi juga menjadi bagian dari komunitas penggemar yang setia.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="../images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Pengiriman Cepat &amp; dan Gratis</h3>
									<p>Nikmati pengiriman cepat dan gratis pada setiap pesanan, sehingga Anda bisa mendapatkan merchandise favorit Anda dengan segera tanpa biaya tambahan!</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="../images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Barang Terlengkap</h3>
									<p>Temukan pilihan barang terlengkap di toko kami, dengan berbagai produk yang memastikan Anda mendapatkan semua merchandise band favorit Anda dalam satu tempat.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="../images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>24/7 Pelayanan</h3>
									<p>Nikmati pelayanan pelanggan 24 jam kami, siap membantu Anda kapan saja untuk memastikan pengalaman berbelanja yang lancar dan memuaskan.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="../images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Fleksibilitas</h3>
									<p>Manfaatkan fleksibilitas belanja di toko kami, dengan berbagai opsi pembayaran dan pengiriman yang dapat disesuaikan dengan kebutuhan Anda.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="../images/store.png" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="../images/hnd.png" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="../images/kst.png" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="../images/srg.png" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">We Help You Find Various Band Merchandise Items</h2>
						<p>Kami membantu Anda menemukan berbagai item merchandise band dengan mudah dan cepat, mulai dari kaos hingga aksesori eksklusif. Dengan koleksi yang luas dan terkurasi, Anda dapat menemukan barang yang sesuai dengan selera dan kebutuhan Anda. Nikmati pengalaman berbelanja yang menyenangkan dengan dukungan kami dalam mencari merchandise band favorit Anda.</p>
						<p><a herf="#" class="btn btn-secondary">Explore</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

		<!-- Start Popular Product -->
		<?php include "../../controllers/product.controller.php"; ?>
		<div class="popular-product">
			<div class="container">
				<div class="row">
					
					<?php $rawData = getProductsByLimit(3); ?>
					<?php while ( $row = mysqli_fetch_assoc($rawData) ): ?>
						<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
							<div class="product-item-sm d-flex">
								<div class="thumbnail">
									<img src="<?php echo $row['images'] ?>" alt="Image" class="img-fluid">
								</div>
								<div class="pt-3">
									<h3><?php echo $row['name'] ?></h3>
									<p><?php echo formatRupiah((int)$row['price']) ?></p>
									<a href="../shop">Shop Now</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>

					

				</div>
			</div>
		</div>
		<!-- End Popular Product -->

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Teams</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Agung adalah pengembang yang bertanggung jawab untuk logika dan fungsionalitas di balik layar. Dengan keahlian dalam bahasa pemrograman seperti PHP, Python, dan Ruby, Agung membangun dan mengelola server, basis data, dan aplikasi web yang mendukung website. Dia memastikan bahwa data diolah dengan benar, dan semua fungsi backend berjalan lancar, dari autentikasi pengguna hingga integrasi API. Agung juga bekerja sama dengan Rina untuk memastikan bahwa front-end dan back-end terhubung dengan baik.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="../images/bgperson.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Agung Pamungkas Noto Utomo</h3>
													<span class="position d-block mb-3">Member of Teams</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Ahmad adalah otak di balik setiap proyek, memastikan semua elemen website bekerja dengan harmonis. Ahmad ahli dalam merancang antarmuka pengguna yang intuitif dan menarik. Dia bertanggung jawab untuk merencanakan timeline, mengkoordinasikan tugas, serta memastikan bahwa desain memenuhi standar estetika dan kegunaan yang tinggi. Ahmad juga sering berinteraksi dengan klien untuk memahami kebutuhan mereka dan menyampaikan visi desain yang sesuai.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="../images/bgperson.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Ahmad Husain</h3>
													<span class="position d-block mb-3">Leader of Teams</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Ahya adalah kreatif di balik semua konten yang ada di website. Dengan pengalaman di penulisan dan strategi konten, Ahya mengembangkan teks yang menarik dan relevan untuk audiens target. Dia melakukan riset untuk memastikan konten yang dihasilkan SEO-friendly dan sesuai dengan strategi pemasaran klien. Ahya juga bekerja sama dengan Agung dan Said untuk memastikan bahwa konten disajikan dengan cara yang menarik dan mudah diakses di seluruh website.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="../images/bgperson.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Muhammad Ahya Mukti Nugroho</h3>
													<span class="position d-block mb-3">Member of Teams</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Said adalah ahli dalam mengubah desain menjadi pengalaman pengguna yang interaktif dan responsif. Dengan keterampilan yang kuat dalam HTML, CSS, dan JavaScript, Said memastikan bahwa setiap elemen website berfungsi dengan mulus di berbagai perangkat dan browser. Keahliannya dalam framework seperti React dan Vue.js memungkinkan dia untuk membangun antarmuka yang dinamis dan mudah digunakan. Said juga berfokus pada optimasi kecepatan dan performa website, memastikan pengalaman pengguna yang cepat dan lancar.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="../images/bgperson.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Said Mahmud Abdullah</h3>
													<span class="position d-block mb-3">Member of Teams</span>
												</div>
											</div>

										</div>
									</div>
								</div> 

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Recent Blog</h2>
					</div>
					<div class="col-md-6 text-start text-md-end">
						<a href="#" class="more">View All Posts</a>
					</div>
				</div>

				<div class="row">

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="../images/post-1.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">First Time Home Owner Ideas</a></h3>
								<div class="meta">
									<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="../images/post-2.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">How To Keep Your Furniture Clean</a></h3>
								<div class="meta">
									<span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="../images/post-3.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Small Space Furniture Apartment Ideas</a></h3>
								<div class="meta">
									<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 12, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Blog Section -->	

		<!-- Start Footer Section -->
		<?php echo $footer; ?>
		<!-- End Footer Section -->	



	<?php echo $script; ?>
</body>
</html>