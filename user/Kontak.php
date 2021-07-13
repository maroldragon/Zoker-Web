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
  
  <div class="container-md form-contact">
		<div class="row">
			<div class="col-md-4 side-left">
				<div class="contact-icon"><i class="fas fa-envelope"></i></div>
				<div class="contact-title">Kontak Kami</div>
				<div class="contact-caption">Silahkan tinggalkan pesan anda, pada kolom yang tersedia</div>
			</div>
			<div class="col-md-8 side-right">				
        <label class="inp-text-label" for="namaPengirim">Nama Anda</label>
        <input type="text" class="form-control inp-text mb-3" id="namaPengirim">
				
        <label class="inp-text-label" for="alamatEmail">Email Anda</label>
        <input type="text" class="form-control inp-text mb-3" id="alamatEmail">
				
        <label class="inp-text-label" for="pesanText">Pesan Anda</label>
				<textarea class="form-control inp-text mb-3" id="pesanText" cols="30" rows="5"></textarea>
				
        <button type="button" class="btn btn-primary">Kirim Pesan</button>
			</div>
		</div>
  </div>

  <?php
    @include_once('footer.php')
  ?>
</body>
</html>