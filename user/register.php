<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Register</title>
</head>
<body>
  <?php
    @include_once('header.php')
  ?>

  <div class="container form-content col-lg-6 col-md-9 col">
    <h1>Daftar Sekarang</h1>
    <div class="row mt-3 mb-2">
      <div class="col">
        <label class="inp-text-label" for="namaDepanInput">Nama Depan</label>
        <input type="text" class="form-control inp-text" id="namaDepanInput">
      </div>
      <div class="col">
        <label class="inp-text-label"  for="namaBelakangInput">Nama Belakang</label>
        <input type="text" class="form-control inp-text" id="namaBelakangInput">
      </div>
    </div>
    <div class="row mb-2 col">
      <div class="col">
        <label class="inp-text-label"  for="usernameInput">Username</label>
        <input type="text" class="form-control inp-text" id="usernameInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label"  for="jenisKelaminInput">Jenis Kelamin</label>
        <select class="form-control inp-text" name="Jenis Kelamin" id="jenisKelaminInput">
          <option value="Laki-Laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label" for="tempatLahirInput">Tempat Lahir</label>
        <input type="text" class="form-control inp-text" id="tempatLahirInput">
      </div>
      <div class="col">
        <label class="inp-text-label" for="tanggalLahirInput">Tanggal Lahir</label>
        <input type="date" class="form-control inp-text" id="tanggalLahirInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label" for="agamaInput">Agama</label>
        <select class="form-control inp-text" name="Agama" id="agamaInput">
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Buddha">Buddha</option>
          <option value="Hindu">Hindu</option>
          <option value="Kong Hu Cu">Kong Hu Cu</option>
        </select>
      </div>
      <div class="col">
        <label class="inp-text-label"  for="hobiInput">Hobi</label>        
        <input type="text" class="form-control inp-text" id="hobiInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label"  for="negaraInput">Negara</label>
        <input type="text" class="form-control inp-text" id="negaraInput">
      </div>
      <div class="col">
        <label class="inp-text-label"  for="provinsiInput">Provinsi</label>
        <input type="text" class="form-control inp-text" id="provinsiInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label"  for="kotaInput">Kota</label>
        <input type="text" class="form-control inp-text" id="kotaInput">
      </div>
      <div class="col">
        <label class="inp-text-label"  for="alamatInput">Alamat</label>
        <input type="text" class="form-control inp-text" id="alamatInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label"  for="emailInput">Email</label>
        <input type="email" class="form-control inp-text" id="emailInput">
      </div>
      <div class="col">
        <label class="inp-text-label"  for="nomotTeleponInput">Nomor Telepon</label>
        <input type="number" class="form-control inp-text" id="nomotTeleponInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label class="inp-text-label"  for="passwordInput">Password</label>
        <input type="password" class="form-control inp-text" id="passwordInput">
      </div>
      <div class="col">
        <label class="inp-text-label"  for="konfirmasiPasswordInput">Konfirmasi Password</label>
        <input type="password" class="form-control inp-text" id="konfirmasiPasswordInput">
      </div>
    </div>
    <div class="row">
      <div class="col">        
        <button type="button" class="btn btn-primary form-control mt-3">Daftar</button>
      </div>
    </div>
  </div>

  
  <?php
    @include_once('footer.php')
  ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>