<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Buku Terpinjam · Perpustakaan Digital</title>
</head>
<body>

  <?php
    @include_once('header.php')
  ?>
  <?php
    @include_once('sourceJs.php')
  ?>

  <div class="container-lg form-content">
    <h1>Riwayat Peminjaman</h1>
    
    <div class="row mt-4">
      <div class="row mt-1" id="listBookRiwayat">
        
      </div>
      <p id="emptyRiwayat" style="color:red;font-size:13px">Belum Ada Riwayat Peminjaman</p>
    </div>
  </div>

  <?php
    @include_once('footer.php')
  ?>
  <?php
	@include_once("sourceJS.html");
	?>
	<script src="js/app.js"></script>
	<script src="js/custom.js"></script>
  <script>
    generateRiwayatPinjaman()
  </script>
</body>
</html>