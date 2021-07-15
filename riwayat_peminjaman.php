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

  <div class="container-lg form-content">
    <h1>Riwayat Peminjaman</h1>
    
    <div class="row mt-4">
      <div class="col-lg-2 col-md-4 col-sm-4 col-6">
        <div class="card">
          <div class="card-rating">
            <i class="fas fa-star"></i><span id="cardRating">4,5</span>
          </div>
          <img src="img/coverbook.jpg" class="card-img-top" alt="..." id="cardRating">
          <div class="card-body">
            <a class="card-title" href="detail_buku.php" id="cardJudul">Under the Black Flag: The Romance and the Reality of Life Among the Pirates</a>
            <div class="card-text" id="cardPenulis">David Cordingly</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
    @include_once('footer.php')
  ?>
</body>
</html>