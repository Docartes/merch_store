<?php

$server_name = $_SERVER['SERVER_NAME'];

$css = '
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="../css/tiny-slider.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
';

$navbar = [
  "not_login" => '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://' . $server_name . '/merch_store/views/home"><img src="../images/CalamitY (1).png" width=120></a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="margin-left: auto;">
        <a class="nav-link active px-4" aria-current="page" href="http://' . $server_name . '/merch_store/views/home">Home</a>
        <a class="nav-link px-4" href="../shop">Shop</a>
        <a class="nav-link px-4" href="../blog">Blog</a>
        <a class="nav-link px-4" href="../auth_views/login.php">Login</a>
        <a class="nav-link px-4" href="../auth_views/register.php">Register</a>
        <a class="nav-link px-4" href="../cart/"><img src="../images/cart.svg"></a>
      </div>
    </div>
  </div>
</nav>',

  "login_user" => '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://' . $server_name . '/merch_store/views/home"><img src="../images/CalamitY (1).png" width=120></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="margin-left: auto;">
        <a class="nav-link active px-4" aria-current="page" href="http://' . $server_name . '/merch_store/views/home">Home</a>
        <a class="nav-link px-4" href="../blog">Blogs</a>
        <a class="nav-link px-4" href="../shop">Shop</a>
        <a class="nav-link px-4" href="../profile"><img src="../images/user.svg"></a>
        <a class="nav-link px-4" href="../cart/"><img src="../images/cart.svg"></a>
      </div>
    </div>
  </div>
</nav>',

  "login_admin" => '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://' . $server_name . '/merch_store/views/home"><img src="../images/CalamitY (1).png" width=120></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="margin-left: auto;">
        <a class="nav-link px-4 active" aria-current="page" href="http://' . $server_name . '/merch_store/views/home">Home</a>
        <a class="nav-link px-4" href="../blog">Blogs</a>
        <a class="nav-link px-4" href="../shop">Shop</a>
        <a class="nav-link px-4" href="../dashboard">Dashboard</a>
        <a class="nav-link px-4" href="../profile"><img src="../images/user.svg"></a>
        <a class="nav-link px-4" href="../cart/"><img src="../images/cart.svg"></a>
      </div>
    </div>
  </div>
</nav>'

];

$footer = '<footer class="footer-section">
      <div class="container relative">
        <div class="row">
          <div class="col-lg-8">
            <div class="subscription-form">
              <h3 class="d-flex align-items-center"><span class="me-1"><img src="../images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Contact Us</span></h3>

              <form action="https://formsubmit.co/ahmadv0101@gmail.com" method="post" class="row g-3">
                <div class="col-auto">
                  <input type="text" name="name" class="form-control" placeholder="Enter your name">
                </div>
                <div class="col-auto">
                  <input type="email" name="email" class="form-control" placeholder="Enter your email">
                </div>
                <div class="col-auto">
                  <textarea class="form-control" name="message" placeholder="Enter your message"></textarea>
                </div>
                <div class="col-auto">
                  <button class="btn btn-primary" type="submit">
                    <span class="fa fa-paper-plane"></span>
                  </button>
                </div>

                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_next" value="http://localhost/merch_store">
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
  </footer>';

$script = '
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/tiny-slider.js"></script>
<script src="../js/custom.js"></script>
';