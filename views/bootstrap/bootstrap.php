<?php  

$css = '
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
';

$navbar = [
  "not_login" => '<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/merch_store/views/home">Merch Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="margin-left: auto;">
        <a class="nav-link active" aria-current="page" href="http://localhost/merch_store/views/home">Home</a>
        <a class="nav-link" href="#">Chart</a>
        <a class="nav-link" href="#">Shop</a>
        <a class="nav-link" href="../auth_views/login.php">Login</a>
        <a class="nav-link" href="../auth_views/register.php">Register</a>
      </div>
    </div>
  </div>
</nav>',

  "login_user" => '<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/merch_store/views/home">Merch Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="margin-left: auto;">
        <a class="nav-link active" aria-current="page" href="http://localhost/merch_store/views/home">Home</a>
        <a class="nav-link" href="#">Chart</a>
        <a class="nav-link" href="#">Shop</a>
        <a class="nav-link" href="../profile"><i class="bi bi-person-circle"></i></a>
      </div>
    </div>
  </div>
</nav>',

  "login_admin" => '<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/merch_store/views/home">Merch Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="margin-left: auto;">
        <a class="nav-link active" aria-current="page" href="http://localhost/merch_store/views/home">Home</a>
        <a class="nav-link" href="#">Chart</a>
        <a class="nav-link" href="#">Shop</a>
        <a class="nav-link" href="#">Dashboard</a>
        <a class="nav-link" href="../profile"><i class="bi bi-person-circle"></i></a>
      </div>
    </div>
  </div>
</nav>'

];

// $navbar = '
// <nav class="navbar navbar-expand-lg bg-body-tertiary">
//   <div class="container-fluid">
//     <a class="navbar-brand" href="http://localhost/merch_store/views/home">Merch Store</a>
//     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
//       <span class="navbar-toggler-icon"></span>
//     </button>
//     <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
//       <div class="navbar-nav" style="margin-left: auto;">
//         <a class="nav-link active" aria-current="page" href="http://localhost/merch_store/views/home">Home</a>
//         <a class="nav-link" href="#">Chart</a>
//         <a class="nav-link" href="#">Shop</a>
//         <a class="nav-link" href="../auth_views/login.php">Login</a>
//         <a class="nav-link" href="../auth_views/register.php">Register</a>
//       </div>
//     </div>
//   </div>
// </nav>
// ';

$script = '
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
'; 