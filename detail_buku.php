<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    @include_once('head.php')
  ?>
  <title>Detail Buku · Perpustakaan Digital</title>
</head>
<body>
  
  <?php
    @include_once('header.php')
  ?>
  
  <div class="container-md form-content col-lg-8 col-md-10 col">
    <div class="row">
      <div class="col-md-4 pos-center pb-3">
        <img src="img/no_image.png" class="img-profil" alt="" id="imageBuku">
        <button type="button" class="btn btn-primary mt-4" id="buttonPinjamBuku">Pinjam Buku</button>
        <p class="d-none" id="waktuPinjam">Waktu</p>
        <p>Rating (<span id="ratingBukuDetail"></span>)</p>
        
      </div>
      <div class="col-md-8">
        <h1 id="textJudul"></h1>
        <div class="font-caption" id="textKategori"></div>
        <div class="font-label">Penulis</div>
        <div class="font-caption" id="textPenulis"></div>
        <div class="font-label">Penerbit</div>
        <div class="font-caption" id="textPenerbit"></div>
        <div class="font-label">Tahun Terbit</div>
        <div class="font-caption" id="textTahunTerbit"></div>
        <div class="font-label">ISBN</div>
        <div class="font-caption" id="textIsbn"></div>
        <div class="font-label">Ringkasan</div>
        <div class="font-caption" id="textRingkasan"></div>
      </div>
    </div>
    <div class="row" id="feedbackRatingUlasan">
      <div class="col mt-5">
        <h1>Feedback</h1>
        <div class="font-label">Rating (<span id="ratingFeedback">0</span>/10) : 
          <div class="star-widget">
            <input type="radio" name="rate" id="rate-10" value="10">
            <label for="rate-10" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-9" value="9">
            <label for="rate-9" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-8" value="8">
            <label for="rate-8" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-7" value="7">
            <label for="rate-7" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-6" value="6">
            <label for="rate-6" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-5" value="5">
            <label for="rate-5" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-4" value="4">
            <label for="rate-4" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-3" value="3">
            <label for="rate-3" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-2" value="2">
            <label for="rate-2" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-1" value="1">
            <label for="rate-1" class="fas fa-star"></label>
          </div>
        </div>
        <div class="font-label mt-4">Ulasan</div>   
				<textarea class="form-control inp-text mt-3" rows="5" id="inputUlasan"></textarea>
        <button type="button" class="btn btn-primary mt-3" id="buttonKirimUlasan">Kirim Ulasan</button>
      </div>
    </div>
  </div>

  <?php
    @include_once('footer.php')
  ?>

<script src="js/custom.js"></script>

<script>

  //DEKLARE VARIABEL
  var ratingValue = 0;
  var ulasanValue = "";

  //SET RATING
  $("input[name='rate']").change(function(){
    $("#ratingFeedback").text($(this).val());
    ratingValue = $(this).val();
  });

  //KIRIM ULASAN
  $("#buttonKirimUlasan").click(function(){
    tambahkanUlasan()
    ulasanValue = $("#inputUlasan").val();
    console.log(ratingValue + " " + ulasanValue);
  });

 $("#buttonPinjamBuku").click(function(){
    savePinjamBuku()
 });

  generateBookDetail()

</script>

</body>
</html>