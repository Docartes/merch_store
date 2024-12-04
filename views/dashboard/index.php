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
	<title>Dashboard</title>

	<?php echo $css; ?>
</head>

<body style="font-family: Karla">
	<?php if (isset($login) && $user_data['role'] == 'user'): ?>
		<?php echo $navbar['login_user']; ?>
		<?php header("Location: ../home"); ?>
	<?php endif; ?>

	<?php if (isset($login) && $user_data['role'] == 'admin'): ?>
		<?php echo $navbar['login_admin']; ?>
	<?php endif; ?>

	<?php if (isset($login) !== true): ?>
		<?php echo $navbar['not_login']; ?>
		<?php header("Location: ../home"); ?>
	<?php endif; ?>

	<div class="container mt-4">
		<div class="row">
			<!-- Sidebar -->
			<nav id="sidebar" class="col-md-3">
				<div class="list-group">
					<a href="#products" class="list-group-item list-group-item-action" data-toggle="collapse">Products</a>
					<a href="#category" class="list-group-item list-group-item-action" data-toggle="collapse">Category</a>
					<a href="#blog" class="list-group-item list-group-item-action" data-toggle="collapse">Blogs</a>
					<!-- <a href="#orderItems" class="list-group-item list-group-item-action" data-toggle="collapse">Order Items</a> -->
				</div>
			</nav>

			<!-- Main Content -->
			<div class="col-md-9">
				<!-- Products Section -->
				<div id="products" class="collapse show">
					<div class="card">
						<div class="card-header">Products</div>
						<div class="card-body">
							<!-- Add Product Form -->
							<h5>Add Product</h5>
							<form action="../../controllers/product.controller.php" method="post">
								<div class="form-group">
									<label for="productName">Product Name</label>
									<input type="text" name="productName" class="form-control" id="productName"
										placeholder="Enter product name" autocomplete="off">
								</div>
								<div class="form-group">
									<label for="productName">Product Image</label>
									<input type="text" class="form-control" name="productImage" id="productName"
										placeholder="Enter product image (link)" autocomplete="off">
								</div>
								<div class="form-group">
									<label for="productPrice">Product Price</label>
									<input type="number" class="form-control" name="productPrice" id="productPrice"
										placeholder="Enter product price" autocomplete="off">
								</div>
								<div class="form-group">
									<label for="productPrice">Stok</label>
									<input type="number" class="form-control" name="stok" id="productPrice"
										placeholder="Enter product stok" autocomplete="off">
								</div>
								<div class="form-group">
									<label for="productPrice">Category Id</label>
									<input type="text" class="form-control" name="category" id="productPrice"
										placeholder="Enter category id" autocomplete="off">
								</div>
								<button type="submit" class="btn btn-primary mt-4">Add Product</button>
							</form>
							<hr>
							<!-- Product List -->
							<h5>Product List</h5>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Stok</th>
										<th>Price</th>
										<th>Actions</th>
									</tr>
								</thead>
								<?php include_once "../../controllers/product.controller.php"; ?>
								<?php $data = readProducts(); ?>
								<tbody>
									<?php while ($row = mysqli_fetch_assoc($data)): ?>
										<!-- Example Row -->
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['name']; ?></td>
											<td><?php echo $row['quantity_in_stock']; ?></td>
											<td><?php echo $row['price']; ?></td>
											<td>
												<a href="../products/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"><i
														class="bi bi-pencil-square"></i></a>
												<a href="../products/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i
														class="bi bi-trash"></i></a>
											</td>
										</tr>
									<?php endwhile; ?>
									<!-- Add more rows as needed -->
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!-- Orders Section -->
				<div id="category" class="my-4 collapse show">
					<div class="card">
						<div class="card-header">Category</div>
						<div class="card-body">
							<!-- Add Order Form -->
							<h5>Add Category</h5>
							<form action="../../controllers/category.controller.php" method="post">
								<div class="form-group">
									<label for="orderCustomer">Category Name</label>
									<input type="text" class="form-control" id="orderCustomer" placeholder="Enter category name"
										autocomplete="off" name="name">
								</div>
								<button type="submit" class="btn btn-primary mt-4">Add Category</button>
							</form>
							<hr>
							<!-- Order List -->

							<h5>Category List</h5>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Category Name</th>
										<th>Actions</th>
									</tr>
								</thead>
								<?php include_once "../../controllers/category.controller.php"; ?>
								<tbody>
									<!-- Example Row -->
									<?php while ($row = mysqli_fetch_assoc($data)): ?>
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['name']; ?></td>
											<td>
												<a href="../category/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"><i
														class="bi bi-pencil-square"></i></a>
												<a href="../category/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i
														class="bi bi-trash"></i></a>
											</td>
										</tr>
									<?php endwhile; ?>
									<!-- Add more rows as needed -->
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!-- Order Items Section -->
				<div id="orderItems" class="collapse">
					<div class="card">
						<div class="card-header">Order Items</div>
						<div class="card-body">
							<!-- Add Order Item Form -->
							<h5>Add Order Item</h5>
							<form>
								<div class="form-group">
									<label for="orderId">Order ID</label>
									<input type="number" class="form-control" id="orderId" placeholder="Enter order ID">
								</div>
								<div class="form-group">
									<label for="productId">Product ID</label>
									<input type="number" class="form-control" id="productId" placeholder="Enter product ID">
								</div>
								<div class="form-group">
									<label for="quantity">Quantity</label>
									<input type="number" class="form-control" id="quantity" placeholder="Enter quantity">
								</div>
								<button type="submit" class="btn btn-primary">Add Order Item</button>
							</form>
							<hr>
							<!-- Order Item List -->
							<h5>Order Item List</h5>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Order ID</th>
										<th>Product ID</th>
										<th>Quantity</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<!-- Example Row -->
									<tr>
										<td>1</td>
										<td>1</td>
										<td>1</td>
										<td>2</td>
										<td>
											<button class="btn btn-warning btn-sm">Edit</button>
											<button class="btn btn-danger btn-sm">Delete</button>
										</td>
									</tr>
									<!-- Add more rows as needed -->
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div id="blog" class="my-4 collapse show">
					<div class="card">
						<div class="card-header">Blogs</div>
						<div class="card-body">
							<!-- Add Order Form -->
							<h5>Add Blog</h5>
							<form action="../../controllers/blog.controller.php" method="post">
								<div class="form-group">
									<label for="title">Blog Title</label>
									<input type="text" class="form-control" id="title" placeholder="Enter blog title"
										autocomplete="off" name="title">
								</div>
								<div class="form-group">
									<label for="image">Blog Image</label>
									<input type="text" class="form-control" id="image" placeholder="Enter blog image (link)"
										autocomplete="off" name="image">
								</div>
								<div class="form-group">
									<label for="content">Blog Content</label>
									<textarea name="content" id="content" class="form-control"></textarea>
								</div>
								<input type="hidden" name="userId" value="<?php echo $user_data['id']; ?>">
								<button type="submit" class="btn btn-primary mt-4">Add Blog</button>
							</form>
							<hr>
							<!-- Order List -->

							<h5>Blogs List</h5>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Title</th>
										<th>Content</th>
									</tr>
								</thead>
								<?php include_once "../../controllers/blog.controller.php"; ?>
								<?php $blog = readBlogs(); ?>
								<tbody>
									<!-- Example Row -->

									<?php while ($row = mysqli_fetch_assoc($blog)): ?>
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['title']; ?></td>
											<td><?php echo $row['content']; ?></td>
											<td>
												<a href="../blog/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"><i
														class="bi bi-pencil-square"></i></a>
												<a href="../blog/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i
														class="bi bi-trash"></i></a>
											</td>
										</tr>
									<?php endwhile; ?>
									<!-- Add more rows as needed -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php echo $script; ?>
</body>

</html>