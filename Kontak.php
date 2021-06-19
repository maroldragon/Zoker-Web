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
  <title>Tentang</title>
  <style type="text/css">
	.contact{
		padding-top: 4%;
	}
	.col-md-3{
		background: #026AA7;
		padding: 4%;
		border-top-left-radius: 0.5rem;
		border-bottom-left-radius: 0.5rem;
	}
	.contact-info{
		margin-top:10%;
	}
	.contact-info img{
		margin-bottom: 15%;
	}
	.contact-info h2{
		margin-bottom: 10%;
	}
	.col-md-9{
		background: #fff;
		padding: 3%;
		border-top-right-radius: 0.5rem;
		border-bottom-right-radius: 0.5rem;
	}
	.contact-form label{
		font-weight:600;
	}
	.contact-form button{
		background: #25274d;
		color: #fff;
		font-weight: 600;
		width: 25%;
        margin-top :10px;
	}
	.contact-form button:focus{
		box-shadow:none;
	}
    .message{
    color: #fff;
    }
    .textarea.form-control {
    min-height: calc(1.5em + 11.75rem + 2px);}

  </style>
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
<div class="container contact">
	<div class="row">
		<div class="col-md-3">
			<div class="message contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
				<h2>Kontak Kami</h2>
				<h4>Silahkan tinggalkan pesan anda, pada kolom yang tersedia.</h4>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="fname">Nama Anda:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="fname" placeholder="Masukkan Nama" name="fname">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">E-mail Anda:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="comment">Pesan Anda:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" id="comment"></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Kirim</button>
				  </div>
				</div>
			</div>
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