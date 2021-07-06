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

  <div class="container mt-5 ps-3 pe-3 col col-6">
    <h3 class="mb-5">FORM PENDAFTARAN</h3>
    <div class="row mb-2">
      <div class="col">
        <label for="namaDepanInput">Nama Depan</label>
        <input type="text" class="form-control inp-text" id="namaDepanInput">
      </div>
      <div class="col">
        <label for="namaBelakangInput">Nama Belakang</label>
        <input type="text" class="form-control" id="namaBelakangInput">
      </div>
    </div>
    <div class="row mb-2 col">
      <div class="col">
        <label for="usernameInput">Username</label>
        <input type="text" class="form-control" id="usernameInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label for="jenisKelaminInput">Jenis Kelamin</label>
        <select class="form-control" name="Jenis Kelamin" id="jenisKelaminInput">
          <option value="Laki-Laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label for="tempatLahirInput">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempatLahirInput">
      </div>
      <div class="col">
        <label for="tanggalLahirInput">Tanggal Lahir</label>
        <input type="text" class="form-control" id="tanggalLahirInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label for="agamaInput">Agama</label>
        <select class="form-control" name="Agama" id="agamaInput">
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Buddha">Buddha</option>
          <option value="Hindu">Hindu</option>
          <option value="Kong Hu Cu">Kong Hu Cu</option>
        </select>
      </div>
      <div class="col">
        <label for="hobiInput">Hobi</label>        
        <input type="text" class="form-control" id="hobiInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label for="negaraInput">Negara</label>
        <input type="text" class="form-control" id="negaraInput">
      </div>
      <div class="col">
        <label for="provinsiInput">Provinsi</label>
        <input type="text" class="form-control" id="provinsiInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label for="kotaInput">Kota</label>
        <input type="text" class="form-control" id="kotaInput">
      </div>
      <div class="col">
        <label for="alamatInput">Alamat</label>
        <input type="text" class="form-control" id="alamatInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label for="emailInput">Email</label>
        <input type="email" class="form-control" id="emailInput">
      </div>
      <div class="col">
        <label for="nomotTeleponInput">Nomor Telepon</label>
        <input type="number" class="form-control" id="nomotTeleponInput">
      </div>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label for="passwordInput">Password</label>
        <input type="password" class="form-control" id="passwordInput">
      </div>
      <div class="col">
        <label for="konfirmasiPasswordInput">Konfirmasi Password</label>
        <input type="password" class="form-control" id="konfirmasiPasswordInput">
      </div>
    </div>
    <div class="row">
      <button type="button" class="btn btn-primary form-control mb-3">DAFTAR</button>
    </div>
  </div>

  <footer class="bgcolorcyan footer mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
          <h5 class="warna">PERPUSTAKAAN DIGITAL</h5>
          <p>Aplikasi Rekomendasi Perpustakaan Digital Menggunakan Deep Collaborative Filtering Berbasis Mobile Dan Web</p>
          <p>Copyright &#169; 2021 Perpustakaan Digital | Zoker</p>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
          <h5>MENU</h5>
          <ul class="list-unstyled">
            <li><a class="nav-link ftcolordark" href="#">Home</a></li>
            <li><a class="nav-link ftcolordark" href="#">Koleksi</a></li>
            <li><a class="nav-link ftcolordark" href="#">Profil</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
          <h5 class="warna">FOLLOW US</h5>
          <a class="ftcolordark" href="https://www.facebook.com"><i class="fab fa-facebook fa-2x"></i></a>
          <a class="ftcolordark" href="https://www.instagram.com"><i class="fab fa-instagram fa-2x"></i></a>
          <a class="ftcolordark" href="https://www.twitter.com"><i class="fab fa-twitter fa-2x"></i></a>          
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-4 col-sm-6 col-12">
          <h5 class="warna">Evan Owen Pasaribu</h5>
          <a class="ftcolordark" href="#">evanowenpasaribu@gmail.com</p></a>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
          <h5 class="warna">Iman Fajar Lombu</h5>
          <a class="ftcolordark" href="#">imanfajarlombu@gmail.com</p></a>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
          <h5 class="warna">Martua Sinaga</h5>
          <a class="ftcolordark" href="#">martuansinaga@gmail.com</p></a>
        </div>
      </div>
    </div>
  </footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>