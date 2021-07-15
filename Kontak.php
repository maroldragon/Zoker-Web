<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Kontak · Perpustakaan Digital</title>
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
        <label class="inp-text-label" for="inputNama">Nama Anda</label>
        <input type="text" class="form-control inp-text mb-3" id="inputNama">
				
        <label class="inp-text-label" for="inputEmail">Email Anda</label>
        <input type="text" class="form-control inp-text mb-3" id="inputEmail">
				
        <label class="inp-text-label" for="inputPesan">Pesan Anda</label>
				<textarea class="form-control inp-text mb-3" id="inputPesan" cols="30" rows="5"></textarea>
				
        <button type="button" class="btn btn-primary" id="buttonKirim">Kirim Pesan</button>
			</div>
		</div>
  </div>

  <?php
    @include_once('footer.php')
  ?>
  <script src="js/custom.js"></script>
</body>
</html>