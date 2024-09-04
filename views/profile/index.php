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

	 <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title text-center mb-4">Profile</h4>
                        <!-- Profile Information -->
                        <img src="https://cdn-icons-png.flaticon.com/512/2815/2815428.png" class="card-img-top rounded-circle border mb-4" style="width: 20rem;">
                        <div class="form-group">
                            <label for="username" class="h3">Username:</label>
                            <p id="username" class="h4 pb-4"><?php echo $user_data['username'] ?></p>
                        </div>
                        <div class="form-group">
                            <label for="email" class="h3" class="">Email:</label>
                            <p id="email" class="h4 pb-4"><?php echo $user_data['email'] ?></p>
                        </div>
                        <div class="form-group">
                            <label for="role" class="h3">Role:</label>
                            <p id="role" class="h4 pb-4"><?php echo $user_data['role'] ?></p>
                        </div>
                        <!-- Logout Button -->
                        <div class="text-center">
                            <a href="logout.php?id=<?php echo $user_data['id']; ?>" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


	<?php echo $script; ?>
</body>
</html>