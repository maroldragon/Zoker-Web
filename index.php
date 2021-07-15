<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Perpustakaan Digital</title>
</head>
<body>
  
  <?php
    @include_once('header.php')
  ?>

  <div class="container-lg form-content">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner" id="carousel-book">
        <div class="carousel-item active">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-5">
              <img src="img/coverbook.jpg" class="carousel-img" alt="..." id="carouselImage">
            </div>
            <div class="col-lg-9 col-md-9 col-sm-7 pos-middle">
              <div class="d-inline mt-4 mb-4">
                <div class="carousel-highlight">Populer</div>
                <div class="carousel-title" id="carouselJudul">Under the Black Flag: The Romance and the Reality of Life Among the Pirates</div>
                <div class="carousel-caption" id="carouselPenulis">David Cordingly</div>
                <a href="detail_buku.php" type="button" class="btn btn-carousel form-control mt-3" id="carouselButton">Lihat Buku</a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-5"><img src="img/coverbook.jpg" class="card-img-top" alt="..."></div>
            <div class="col-lg-9 col-md-9 col-sm-7 pos-middle">
              <div class="d-inline mt-4 mb-4">
                <div class="carousel-highlight">Populer</div>
                <div class="carousel-title">Under the Black Flag: The Romance and the Reality of Life Among the Pirates</div>
                <div class="carousel-caption">David Cordingly</div>
                <a href="detail_buku.php" type="button" class="btn btn-carousel form-control mt-3" id="carouselButton">Lihat Buku</a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-5"><img src="img/coverbook.jpg" class="card-img-top" alt="..."></div>
            <div class="col-lg-9 col-md-9 col-sm-7 pos-middle">
              <div class="d-inline mt-4 mb-4">
                <div class="carousel-highlight">Populer</div>
                <div class="carousel-title">Under the Black Flag: The Romance and the Reality of Life Among the Pirates</div>
                <div class="carousel-caption">David Cordingly</div>
                <a href="detail_buku.php" type="button" class="btn btn-carousel form-control mt-3" id="carouselButton">Lihat Buku</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row mt-5">
      <div class="col-12">
        <h1>Baru Ditambahkan</h1>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 col-6">
        <div class="card">
          <div class="card-rating">
            <i class="fas fa-star"></i><span id="newCardRating">4,5</span>
          </div>
          <img src="img/coverbook.jpg" class="card-img-top" alt="..." id="newCardImage">
          <div class="card-body">
            <a class="card-title" href="detail_buku.php" id="newCardJudul">Under the Black Flag: The Romance and the Reality of Life Among the Pirates</a>
            <div class="card-text" id="newCardPenulis">David Cordingly</div>
          </div>
        </div>
      </div>
    </div>


    <div class="row mt-5">
      <div class="col-12">
        <h1>Rekomendasi</h1>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 col-6">
        <div class="card">
          <div class="card-rating">
            <i class="fas fa-star"></i><span id="rekCardRating">4,5</span>
          </div>
          <img src="img/coverbook.jpg" class="card-img-top" alt="..." id="rekCardImage">
          <div class="card-body">
            <a class="card-title" href="detail_buku.php" id="rekCardJudul">Under the Black Flag: The Romance and the Reality of Life Among the Pirates</a>
            <div class="card-text" id="rekCardPenulis">David Cordingly</div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  

  <?php
    @include_once('footer.php')
  ?>

  <script src="js/custom.js"></script>

  <script>
    addCarousel()
  </script>

</body>
</html>