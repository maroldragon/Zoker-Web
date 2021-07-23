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
    <h1>Buku Terpinjam</h1>

    <div class="row mt-4">
      <div class="row mt-1" id="listBookTerpinjam">
        
      </div>
      <p id="emptyPinjam" style="color:red;font-size:13px">Belum Ada Buku Yang di Pinjam</p>
    </div>
  </div>

  <?php
  @include_once('footer.php')
  ?>
  <?php
    @include_once('sourceJs.php')
  ?>

  <script src="js/custom.js"></script>
  <script>
    generateBukuTerpinjam()
  </script>

</body>

</html>