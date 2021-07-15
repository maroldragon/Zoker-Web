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
    <h1 id="textJudulBuku">Under the Black Flag: The Romance and the Reality of Life Among the Pirates</h1>
    <p id="textPenulis">David Cordingly</p>
    <div class="viewBook" id="viewBook"></div>    
    <a href="detail_buku.php#feedbackRatingUlasan" class="btn btn-primary form-control mt-3" id="buttonRatingUlasan">Berikan Rating dan Ulasan</a>
  </div>

  <?php
    @include_once('footer.php')
  ?>

  <script>PDFObject.embed("./pdf/book.pdf", "#viewBook");</script>

</body>
</html>