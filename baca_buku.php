<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Baca Buku · Perpustakaan Digital</title>
</head>
<body>
  
  <?php
    @include_once('header.php')
  ?>
  
  <div class="container-md form-content col-lg-8 col-md-10 col">
    <h1 id="textJudulBuku">Judul Buku</h1>
    <p id="textPenulis">Penulis</p>
    <div class="viewBook" id="viewBook"></div>    
    <a href="detail_buku.php?isbn=<?php echo $_GET['read'];?>#feedbackRatingUlasan" class="btn btn-primary form-control mt-3" id="buttonRatingUlasan">Berikan Rating dan Ulasan</a>
  </div>

  <?php
    @include_once('footer.php')
  ?>
  <?php
    @include_once('sourceJs.php')
  ?>

  <script src="js/custom.js"></script>
  <script>
      readBook()
  </script>

  <script></script>

</body>
</html>