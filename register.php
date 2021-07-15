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
    <h1>Daftar Sekarang</h1>
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
        <label class="inp-text-label" for="inputTempatLahir">Tempat Lahir</label>
        <input type="text" class="form-control inp-text" id="inputTempatLahir">
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
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label"  for="inputPassword">Password</label>
        <input type="password" class="form-control inp-text" id="inputPassword">
      </div>
      <div class="col">
        <label class="inp-text-label"  for="inputKonfirmasiPassword">Konfirmasi Password</label>
        <input type="password" class="form-control inp-text" id="inputKonfirmasiPassword">
      </div>
    </div>
    <div class="row">
      <div class="col">        
        <button type="submit" class="btn btn-primary form-control mt-3" id="buttonDaftar">Daftar</button>
      </div>
    </div>
  </div>

  
  <?php
    @include_once('footer.php')
  ?>

  <script> 
    
    $("#buttonDaftar").click(function(){
      var namaDepan = $("#inputNamaDepan").val();
      var namaBelakang = $("#inputNamaBelakang").val();
      var userName = $("#inputUsername").val();
      var jenisKelamin = $("#inputJenisKelamin").val();
      var tempatLahir = $("#inputTempatLahir").val();
      var tanggalLahir = $("#inputTanggalLahir").val();
      var agama = $("#inputAgama").val();
      var hobi = $("#inputHobi").val();
      var negara = $("#inputNegara").val();
      var provinsi = $("#inputProvinsi").val();
      var kota = $("#inputKota").val();
      var alamat = $("#inputAlamat").val();
      var email = $("#inputEmail").val();
      var password = $("#inputPassword").val();
      //console.log(namaDepan+" "+namaBelakang+" "+userName+" "+jenisKelamin +" "+tempatLahir+" "+tanggalLahir+" "+agama+" "+hobi +" "+negara +" "+provinsi +" "+kota +" "+alamat +" "+email +" "+password);
    });
  </script>
</body>
</html>