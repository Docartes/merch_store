<?php  

session_start();

include '../bootstrap/bootstrap.php';
include_once "../../controllers/product.controller.php";

if ( isset($_SESSION['login']) || isset($_SESSION['data_login']) ) {    
    $login = $_SESSION['login'];
    $user_data = $_SESSION['data_login'];
}

if ( isset($_POST['name']) ) {
    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $image = htmlspecialchars($_POST['image']);
    $price = (int)$_POST['price'];
    $stok = (int)$_POST['stok'];
    $categoryId = (int)$_POST['categoryId'];


    updateProducts($id, $name, $image, $price, $stok, $categoryId);

    header("Location: ../dashboard");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <?php echo $css; ?>
</head>
<body>

    <?php if ( isset($login) && $user_data['role'] == 'user' ): ?>
        <?php echo $navbar['login_user']; ?>
        <?php header("Location: ../home"); ?>
    <?php endif; ?>

    <?php if ( isset($login) && $user_data['role'] == 'admin' ): ?>
        <?php echo $navbar['login_admin']; ?>
    <?php endif; ?>

    <?php if ( isset($login) !== true ): ?>
        <?php echo $navbar['not_login']; ?>
        <?php header("Location: ../home"); ?>
    <?php endif; ?>


    <?php $data = getProductById($_GET['id']); ?>
    <?php $row = mysqli_fetch_assoc($data); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Product</div>
                    <div class="card-body">
                        <!-- Edit Product Form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="productId">Product ID</label>
                                <input type="text" class="form-control" name="id" id="productId" value="<?php echo $row['id'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" name="name" id="productName" value="<?php echo $row['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="productName">Product Image</label>
                                <input type="text" class="form-control" name="image" id="productName" value="<?php echo $row['images'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Price</label>
                                <input type="number" class="form-control" name="price" id="productPrice" value="<?php echo $row['price'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Stok</label>
                                <input type="number" class="form-control" id="productPrice" name="stok" value="<?php echo $row['quantity_in_stock']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Category Id</label>
                                <input type="number" class="form-control" id="productPrice" name="categoryId" value="<?php echo $row['categoryId']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Save Changes</button>
                            <a href="../dashboard" class="btn btn-secondary mt-4">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $script; ?>

</body>
</html>