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
  
  <div class="container-md form-content col-lg-8 col-md-10 col">
    <div class="row">
      <div class="col-md-4 pos-center pb-3">
        <img src="img/profil.jpg" class="rounded-circle img-profil" alt="">
        <button type="button" class="btn btn-primary mt-4">Ubah Foto</button>
      </div>
      <div class="col-md-8">
        <h1>Profil</h1>
        <div class="row mt-4">
          <div class="col-4">
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
          <div class="col-8">
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
        <button type="button" class="btn btn-primary mt-4">Edit Profil</button>
      </div>
    </div>
  </div>

  <?php
    @include_once('footer.php')
  ?>
</body>
</html>