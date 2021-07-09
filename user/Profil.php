<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Profil</title>
</head>
<body>
  
  <?php
    @include_once('header.php')
  ?>
  
  <div class="container-lg form-content">
    <div class="row">
      <div class="col-md-4 pos-center">
        <img src="img/login-cover.jpg" class="img-login" alt="">
        <button type="button" class="btn btn-primary">Ubah Foto</button>
      </div>
      <div class="col-md-8">
        <h1>Profil</h1>
        <div class="row">
          <div class="col-3">
            <p>Nama Lengkap</p>
            <p>Username</p>
            <p>Jenis Kelamin</p>
            <p>Tempat Lahir</p>
            <p>Tanggal Lahir</p>
            <p>Agama</p>
            <p>Hobi</p>
            <p>Alamat</p>
            <p>Kota</p>
            <p>Provinsi</p>
            <p>Negara</p>
            <p>Email</p>
          </div>
          <div class="col-9">
            <p>: String</p>
            <p>: String</p>
            <p>: String</p>
            <p>: String</p>
            <p>: String</p>
            <p>: String</p>
            <p>: String</p>
            <p>: String</p>
            <p>: String</p>
            <p>: String</p>
            <p>: String</p>
            <p>: String</p>
          </div>
        </div>
        <button type="button" class="btn btn-primary mt-3">Edit Profil</button>
      </div>
    </div>
  </div>

  <?php
    @include_once('footer.php')
  ?>
</body>
</html>