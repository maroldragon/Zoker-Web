<footer>
  <div class="container-lg position-relative">
    <div class="row mb-2">
      <div class="col-4 pos-left">
        <h1>Navigasi</h1>
      </div>
      <div class="col-8 pos-right">
        <h1>Aplikasi Rekomendasi Perpustakaan Digital Menggunakan Deep Collaborative Filtering Berbasis Mobile Dan Web</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-4 pos-left">
        <ul class="list-unstyled">
          <li><a class="d-flex footer-link" href="index.php">Beranda</a></li>
          <li><a class="d-flex footer-link" href="kategori.php">Koleksi</a></li>
          <li><a class="d-flex footer-link" href="kontak.php">Kontak</a></li>
          <li><a class="d-flex footer-link" href="tentang.php">Tentang Kami</a></li>
        </ul>
      </div>
      <div class="col-8 pos-right">
        <div class="row">
          <div class="col">
            Dikembangkan Oleh:
          </div>
        </div>
        <div class="row mt-2">
          <div class="col">
            Evan Owen Pasaribu
            <span><img src="./img/photo_owen.png" class="img-footer" alt=""></span>
          </div>
        </div>
        <div class="row mt-1">
          <div class="col">
            Iman Fajar Lombu
            <span><img src="./img/photo_fajar.png" class="img-footer" alt=""></span>
          </div>
        </div>
        <div class="row mt-1">
          <div class="col">
            Martua Sinaga
            <span><img src="./img/photo_martua.png" class="img-footer" alt=""></span>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3 pos-center">
      <div class="col">Copyright &#169; 2021 Perpustakaan Digital | Zoker</div>
    </div>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="./js/PDFObject-master/pdfobject.js"></script>



<!-- FIREBASE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-storage.js"></script>
<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-analytics.js"></script>
<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-firestore.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyAptRT0XdCrNCtA5P3g25mxmjlRAQwCyMQ",
    authDomain: "perpustakaan-digital-37f9f.firebaseapp.com",
    databaseURL: "https://perpustakaan-digital-37f9f-default-rtdb.firebaseio.com",
    projectId: "perpustakaan-digital-37f9f",
    storageBucket: "perpustakaan-digital-37f9f.appspot.com",
    messagingSenderId: "683403808558",
    appId: "1:683403808558:web:2501d1142b5ebb86af74bf",
    measurementId: "G-WHQ37ZSD7F"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  
</script>