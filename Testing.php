<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <title>Testing</title>
</head>
<body>
  <div class="navbar d-flex bgcolorcyan">
    <div class="container">
      <a href="index.php" class="navbar-brand"><img src="img/logo.png" width="130" height="40" class="d-inline-block align-top" alt=""></a>
      <input type="text" class="search" placeholder="Cari Buku ...">
      <div class="ms-auto">
        <ul class="navbar nav">
          <li class="nav-item"><a class="nav-link ftcolordark" href="kategori.php">KATEGORI</a></li>
          <li class="nav-item"><a class="nav-link ftcolordark" href="#">KONTAK</a></li>
          <li class="nav-item"><a class="nav-link ftcolordark" href="#">TENTANG</a></li>
          <li class="nav-item active"><a class="nav-link ftcolordark notifikasi" href="#"><i class="#"></i></a></li>
          <li class="nav-item active"><a class="nav-link ftcolordark user" href="#"><i class="#"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
<!--End Header-->
  
<!--Isi Body-->

<div class="container">
  <div class="kontak row">
    <div class="col">
      <center><h2>Kontak Kami</h2></center>
    </div>
  </div>
  <div class="kontak row">
    <div class="col">
        <div class="card-body mb-3" style="max-width: 540px;">
            <div class="col-md-8">
            <div class="card-body">
                <img src="img/DP2.png" class="card-img-top" alt="...">
                <h5 class="card-title">Kontak Kami</h5>
                <p class="card-text">Silahkan tinggalkan pesan anda, pada kolom yang tersedia.</p>
            </div>
            </div>
        
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Anda:</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email Anda:</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email@dot.com">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Pesan Anda:</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Kirim</button>
    </div>
    </div>
  </div>
</div>

<!--End Footer-->
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