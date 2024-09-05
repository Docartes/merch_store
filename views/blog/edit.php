<?php

session_start();

include '../bootstrap/bootstrap.php';
include_once '../../controllers/blog.controller.php';
if (isset($_SESSION['login']) || isset($_SESSION['data_login'])) {
    $login = $_SESSION['login'];
    $user_data = $_SESSION['data_login'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id = htmlspecialchars($_POST['id']);
    $image = htmlspecialchars($_POST['image']);
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $userId = htmlspecialchars($_POST['userId']);

    updateBlogs($id, $image, $title, $content, $userId);

    header('Location: ../dashboard');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
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

    <?php $data = getBlogById($_GET['id']); ?>
    <?php $row = mysqli_fetch_assoc($data); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Blogs</div>
                    <div class="card-body">
                        <!-- Edit Product Form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="productId">Blog ID</label>
                                <input type="text" class="form-control" name="id" id="blogId" value="<?php echo $row['id'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="productName">Blog Image</label>
                                <input type="text" class="form-control" name="image" id="title" value="<?php echo $row['image'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="productName">Blog Title</label>
                                <input type="text" class="form-control" name="title" id="tile" value="<?php echo $row['title'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="blogContent">Blog Content</label>
                                <textarea name="content" id="blogContent" class="form-control"><?php echo $row['content'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="productPrice">User Id</label>
                                <input type="text" class="form-control" id="productPrice" name="userId" value="<?php echo $row['userId']; ?>">
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