<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Profil · Perpustakaan Digital</title>
</head>
<body>
  
  <?php
    @include_once('header.php')
  ?>
  
  <div class="container-md form-content col-lg-8 col-md-10 col">
    <div class="row">
      <div class="col-md-4 pos-center pb-3">
        <img src="img/profil.jpg" class="rounded-circle img-profil" alt="" id="imageProfil">
        <button type="button" class="btn btn-primary mt-4" id="buttonUbahFoto">Ubah Foto</button>
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
            <p id="textNamaLengkap">: String</p>
            <p id="textUsername">: String</p>
            <p id="textJenisKelamin">: String</p>
            <p id="textTempatLahir">: String</p>
            <p id="textTanggalLahir">: String</p>
            <p id="textAgama">: String</p>
            <p id="textHobi">: String</p>
            <p id="textAlamat">: String</p>
            <p id="textKota">: String</p>
            <p id="textProvinsi">: String</p>
            <p id="textNegara">: String</p>
            <p id="textEmail">: String</p>
          </div>
        </div>
        <button type="button" class="btn btn-primary mt-4" id="buttonEditProfil">Edit Profil</button>
      </div>
    </div>
  </div>

  <?php
    @include_once('footer.php')
  ?>
</body>
</html>