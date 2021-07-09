<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Search</title>
</head>
<body>
  <?php
    @include_once('header.php')
  ?>

  <div class="container-lg form-content">
    <h1>Search</h1>
    <div class="row">
      <div class="col-md-4">
        <label class="inp-text-label" for="judulBuku">Judul Buku</label>
        <input type="text" class="form-control inp-text" id="judulBuku">
      </div>
      <div class="col-md-4">
        <label class="inp-text-label" for="penulis">Penulis</label>
        <input type="text" class="form-control inp-text" id="penulis">
      </div>
      <div class="col-md-4">
        <label class="inp-text-label" for="isbn">ISBN</label>
        <input type="text" class="form-control inp-text" id="isbn">
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-2">        
        <button type="button" class="btn btn-primary form-control mt-2">Cari Item</button>
      </div>
    </div>

    <div class="row mt-3">
      <h1>Hasil Pencarian</h1>
      <div class="col-lg-2 col-md-4 col-sm-4 col-6">
        <div class="card">
          <div class="card-rating">
            <i class="fas fa-star"></i><span>4,5</span>
          </div>
          <img src="img/coverbook.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <a class="card-title" href="#">Under the Black Flag: The Romance and the Reality of Life Among the Pirates</a>
            <div class="card-text">David Cordingly</div>
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