<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Login</title>
</head>
<body>
  
  <?php
    @include_once('header.php')
  ?>

  <div class="container form-content col-lg-6 col-md-10 col">    
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 pos-middle">
        <img src="img/login-cover.jpg" class="img-login" alt="">
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <h1>Masuk</h1>
        <div class="mt-3 mb-2">
          <label class="inp-text-label" for="usernameInput">Username</label>
          <input type="text" class="form-control inp-text" id="usernameInput" placeholder="Username">
        </div>
        <div class="mb-2">
          <label class="inp-text-label" for="passwordInput">Password</label>
          <input type="password" class="form-control inp-text" id="passwordInput" placeholder="Password">
        </div>
        <button type="button" class="btn btn-primary form-control mt-3">Masuk</button>
        <button type="button" class="btn btn-secondary form-control mt-3">Daftar</button>
      </div>
    </div>
    <div class="row">
      <div class="col align-self-center">
        <button type="button" class="btn btn-link form-control mt-5">Login Sebagai Admin</button>
      </div>
    </div>
  </div>

  
  <?php
    @include_once('footer.php')
  ?>
  
</body>
</html>