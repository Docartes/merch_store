<?php  
session_start();

include "../bootstrap/bootstrap.php";
include "../../controllers/product.controller.php";
include "../../controllers/orderItem.controller.php";

if ( isset($_SESSION['login']) || isset($_SESSION['data_login']) ) {	
	$login = $_SESSION['login'];
	$user_data = $_SESSION['data_login'];
}

if ( isset($_GET['id']) ) {
  $data = getProductById($_GET['id']);

  $row = mysqli_fetch_assoc($data);
  if ( $user_data['id'] ) {
    insertOrderItem($row['id'], (int)$row['price'], 1, $user_data['id']);
    header("Location: index.php");
  }

  $err_msg = "You must login or register first";
}

if ( isset($_GET['remove']) ) {
  deleteOrderItem($_GET['remove']);
  header("Location: index.php");
}

if ( isset($_POST['quantity']) ) {
  updateOrderItem($_POST['id'], $_POST['productId'], (int)$_POST['unitPrice'], $_POST['quantity'], $_POST['userId']);
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
	<title>Cart</title>
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
		


		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <?php if ( $err_msg ): ?>
                  <h5 class="text-center text-danger pb-4"><?php echo $err_msg; ?></h5>
                <?php endif; ?>
                <form class="col-md-12" method="post" action="">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                          <th class="product-update">Update</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $orderItem = getOrderItemById($user_data['id']); ?>
                        <?php while ( $row = mysqli_fetch_assoc($orderItem) ): ?>
                          <?php $rawDataProduct = getProductById($row['productId']); ?>
                          <?php $dataProduct = mysqli_fetch_assoc($rawDataProduct) ?>
                          <tr>
                            <input type="text" name="id" hidden value="<?php echo $row['id']; ?>">
                            <input type="text" name="unitPrice" hidden value="<?php echo $row['unitPrice']; ?>">
                            <input type="text" name="userId" hidden value="<?php echo $row['userId']; ?>">
                            <input type="text" name="productId" hidden value="<?php echo $row['productId']; ?>">
                            <td class="product-thumbnail">
                              <img src="<?php echo $dataProduct['images'] ?>" alt="Image" class="img-fluid">
                            </td>
                            <td class="product-name">
                              <h2 class="h5 text-black"><?php echo $dataProduct['name'] ?></h2>
                            </td>
                            <td><?php echo formatRupiah((int)$dataProduct['price']) ?></td>
                            <td>
                              
                                <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                                  <div class="input-group-prepend">
                                    <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                                  </div>
                                  <input type="text" name="quantity" class="form-control text-center quantity-amount" value="<?php echo $row['quantity'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                  <div class="input-group-append">
                                    <button class="btn btn-outline-black increase" type="button">&plus;</button>
                                  </div>
                                </div>
                              
          
                            </td>
                            <td><?php echo formatRupiah((int)$row['totalPrice']); ?></td>
                            <td><a href="index.php?remove=<?php echo $row['id']; ?>" class="btn btn-black btn-sm">X</a></td>
                            <td><button type="submit" class="btn btn-black btn-sm"><i class="bi bi-pencil-square"></i></button></td>
                          </tr>
                        <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">                
                    <div class="col-md-6">
                      <button class="btn btn-outline btn-dark btn-sm btn-block" onclick="window.location='../shop'">Continue Shopping</button>
                    </div>
                  </div>
                </div>

                <?php
                  $total = 0;
                  $rawData = getOrderItemById($user_data['id']);
                  while ( $row = mysqli_fetch_assoc($rawData) ) {
                    $total += (int)$row['totalPrice'];
                  }

                  // is_array($orderItemData);
                ?>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black"><?php echo formatRupiah((int)$total); ?></strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black"><?php echo formatRupiah((int)$total); ?></strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-dark btn-lg py-3 btn-block" onclick="window.location='checkout.html'">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		

		<!-- Start Footer Section -->
		<?php echo $footer; ?>

	<?php echo $script; ?>
</body>
</html>