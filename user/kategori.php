<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Kategori</title>
</head>
<body>

  <?php
    @include_once('header.php')
  ?>

  <div class="container-lg form-content">
    <h1>Kategori</h1>
    
    <form class="d-flex">
      <select class="form-control inp-select" name="Kategori" id="kategoriInput">
        <option value="Novel">Novel</option>
        <option value="Komik">Komik</option>
        <option value="Ensiklopedi">Ensiklopedi</option>
        <option value="Dongeng">Dongeng</option>
      </select>
      <button class="btn btn-select" type="submit">Filter</button>
    </form>
    <div class="row mt-4">
      <div class="col-12">
        <h1>Hasil</h1>
      </div>
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