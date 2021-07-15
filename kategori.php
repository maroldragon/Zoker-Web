<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Kategori · Perpustakaan Digital</title>
</head>
<body>

  <?php
    @include_once('header.php')
  ?>

  <div class="container-lg form-content">
    <h1>Kategori</h1>
    
    <form class="d-flex">
      <select class="form-control inp-select" name="Kategori" id="inputKategori">
        <option value="">Semua Kategori</option>
        <option value="fiction">Fiction</option>
        <option value="social science">Social Science</option>
        <option value="actresses">Actresses</option>
        <option value="medical">Medical</option>
        <option value="nature">Nature</option>
      </select>
      <button class="btn btn-select" type="button" id="buttonFilter">Filter</button>
    </form>
    <div class="row mt-4">
      <div class="col-12">
        <h1>Hasil</h1>
      </div>
      <div class="row mt-1" id="listBookKategori">
        <div class="col-lg-2 col-md-4 col-sm-4 col-6">
          <div class="card">
            <div class="card-rating">
              <i class="fas fa-star"></i><span id="katCardRating">4,5</span>
            </div>
            <img src="img/coverbook.jpg" class="card-img-top" alt="..." id="katCardImage">
            <div class="card-body">
              <a class="card-title" href="detail_buku.php" id="katCardJudul">Under the Black Flag: The Romance and the Reality of Life Among the Pirates</a>
              <div class="card-text" id="katCardPenulis">David Cordingly</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
    @include_once('footer.php')
  ?>
  <script src="js/custom.js"></script>
  <script>
    addKategoriBook("");
    $("#buttonFilter").click(function() {
      var kategori = $("#inputKategori option:selected").val()
      console.log(kategori);
      addKategoriBook(kategori)
    })
  </script>
</body>
</html>