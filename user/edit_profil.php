<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Register · Perpustakaan Digital</title>
</head>
<body>
  <?php
    @include_once('header.php')
  ?>

  <div class="container form-content col-lg-6 col-md-9 col">
    <h1>Edit Profil</h1>
    <div class="row mt-3 mb-2">
      <div class="col">
        <label class="inp-text-label" for="inputNamaDepan">Nama Depan</label>
        <input type="text" class="form-control inp-text" id="inputNamaDepan">
      </div>
      <div class="col">
        <label class="inp-text-label"  for="inputNamaBelakang">Nama Belakang</label>
        <input type="text" class="form-control inp-text" id="inputNamaBelakang">
      </div>
    </div>
    <div class="row mb-2 col">
      <div class="col">
        <label class="inp-text-label"  for="inputUsername">Username</label>
        <input type="text" class="form-control inp-text" id="inputUsername">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label"  for="inputJenisKelamin">Jenis Kelamin</label>
        <select class="form-control inp-text" name="Jenis Kelamin" id="inputJenisKelamin">
          <option value="Laki-Laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label" for="inputTanggalLahir">Tempat Lahir</label>
        <input type="text" class="form-control inp-text" id="inputTanggalLahir">
      </div>
      <div class="col">
        <label class="inp-text-label" for="inputTanggalLahir">Tanggal Lahir</label>
        <input type="date" class="form-control inp-text" id="inputTanggalLahir">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label" for="inputAgama">Agama</label>
        <select class="form-control inp-text" name="Agama" id="inputAgama">
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Buddha">Buddha</option>
          <option value="Hindu">Hindu</option>
          <option value="Kong Hu Cu">Kong Hu Cu</option>
        </select>
      </div>
      <div class="col">
        <label class="inp-text-label"  for="inputHobi">Hobi</label>        
        <input type="text" class="form-control inp-text" id="inputHobi">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label"  for="inputNegara">Negara</label>
        <input type="text" class="form-control inp-text" id="inputNegara">
      </div>
      <div class="col">
        <label class="inp-text-label"  for="inputProvinsi">Provinsi</label>
        <input type="text" class="form-control inp-text" id="inputProvinsi">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label"  for="inputKota">Kota</label>
        <input type="text" class="form-control inp-text" id="inputKota">
      </div>
      <div class="col">
        <label class="inp-text-label"  for="inputAlamat">Alamat</label>
        <input type="text" class="form-control inp-text" id="inputAlamat">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label"  for="inputEmail">Email</label>
        <input type="email" class="form-control inp-text" id="inputEmail">
      </div>
    </div>
    <div class="row">
      <div class="col">        
        <button type="submit" class="btn btn-primary form-control mt-3" id="buttonDaftar">Simpan Profil</button>
        <a href="profil.php" class="btn btn-secondary form-control mt-3" id="buttonRegister">Cancel</a>
      </div>
    </div>
  </div>

  
  <?php
    @include_once('footer.php')
  ?>

</body>
</html>