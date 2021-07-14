<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Pencarian · Perpustakaan Digital</title>
</head>
<body>
  <?php
    @include_once('header.php')
  ?>

  <div class="container-lg form-content">
    <h1>Search</h1>
    <div class="row">
      <div class="col-md-4">
        <label class="inp-text-label" for="inputJudulBuku">Judul Buku</label>
        <input type="text" class="form-control inp-text" id="inputJudulBuku">
      </div>
      <div class="col-md-4">
        <label class="inp-text-label" for="inputPenulis">Penulis</label>
        <input type="text" class="form-control inp-text" id="inputPenulis">
      </div>
      <div class="col-md-4">
        <label class="inp-text-label" for="inputIsbn">ISBN</label>
        <input type="text" class="form-control inp-text" id="inputIsbn">
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-2">        
        <button type="button" class="btn btn-primary form-control mt-2" id="buttonCariItem">Cari Item</button>
      </div>
    </div>

    <div class="row mt-3">
      <h1>Hasil Pencarian</h1>
      <div class="col-lg-2 col-md-4 col-sm-4 col-6">
        <div class="card">
          <div class="card-rating">
            <i class="fas fa-star"></i><span id="cardRating">4,5</span>
          </div>
          <img src="img/coverbook.jpg" class="card-img-top" alt="..." id="cardImage">
          <div class="card-body">
            <a class="card-title" href="detail_buku.php"  id="cardJudul">Under the Black Flag: The Romance and the Reality of Life Among the Pirates</a>
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