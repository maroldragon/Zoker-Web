<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  @include_once('head.php')
  ?>
  <title>Login · Perpustakaan Digital</title>
</head>

<body>

  <?php
  @include_once('header.php')
  ?>

  <div class="container form-content col-lg-4 col-md-6 col">
    <div class="row mb-3 d-none" id="textLogout">
      <div class="col pos-center p-danger">
        Anda Telah Keluar
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h1>Pemulihan akun</h1>
        <div class="mt-3 mb-4">
          <label class="inp-text-label mb-2" for="inputEmailForgot">Masukkan Email Anda</label>
          <input type="text" class="form-control inp-text" id="inputEmailForgot" placeholder="Email">
        </div>
        <div class="row mb-5">
          <div class="col">
            <a href="./login.php" class="btn form-control mt-3" id="buttonRegister">Kembali</a>
          </div>
          <div class="col ">
            <button type="button" class="btn btn-primary form-control mt-3" id="buttonKirimVerifikasi">Kirim Verifikasi</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
    @include_once('footer.php')
  ?>

  <script>
    $("#buttonKirimVerifikasi").click(function() {
      var email = $("#inputEmailForgot").val()
      lupaPassword(email)
    })

    function lupaPassword(email) {
      firebase.auth().sendPasswordResetEmail(email).then(() => {
        swal("Success", "Silahkan Periksa Email Anda Untuk Mengganti Password", "success").then(() => {
          location.href= "./login.php"
        })
      })
    }
  </script>

</body>

</html>