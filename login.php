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

  <div class="container form-content col-lg-6 col-md-10 col">
    <div class="row mb-3 d-none" id="textLogout">
      <div class="col pos-center p-danger">
        Anda Telah Keluar
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 pos-middle">
        <img src="img/login-cover.jpg" class="img-login" alt="">
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <h1>Masuk</h1>
        <div class="mt-3 mb-2">
          <label class="inp-text-label" for="inputUsername">Email</label>
          <input type="text" class="form-control inp-text" id="inputUsername" placeholder="Email">
        </div>
        <div class="mb-2">
          <label class="inp-text-label" for="inputPassword">Password</label>
          <div class="input-group">
            <input type="password" class="form-control inp-text" id="inputPassword" placeholder="Password">
            <button class="btn btn-select" type="button" id="showPassword">
              <i class="fas fa-eye" id="iconShowPassword"></i>
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col pos-right">
            <a href="./forgot-pass.php" class="btn p-danger" >Lupa Sandi?</a>
          </div>
        </div>
        <button type="button" class="btn btn-primary form-control" id="buttonLogin">Masuk</button>
        
        <a href="./register.php" class="btn btn-secondary form-control mt-3" id="buttonRegister">Daftar</a>
      </div>
    </div>
    <div class="row">
      <div class="col align-self-center">
        <a href="admin/" class="btn btn-primary form-control mt-5" id="buttonLoginAdmin">Login Sebagai Admin</a>
      </div>
    </div>
  </div>


  <?php
  @include_once('footer.php')
  ?>
  <?php
    @include_once('sourceJs.php')
  ?>

  <script>
    $("#buttonLogin").click(function(event) {
      const dbRef = firebase.database().ref();
      event.preventDefault()
      let username = $("#inputUsername").val()
      let password = $("#inputPassword").val();
      //console.log(username)
      var state = false
      if (username.trim() == "" && password == "") {
        swal("Error", "Email dan Password Tidak Boleh Kosong", "error");
      } else if (username.trim() == "") {
        swal("Error", "Email Tidak Boleh Kosong", "error");
      }else if(!validateEmail(username)) {
        swal("Error", "Format Email Salah", "error");
      }else if (password.trim() == "") {
        swal("Error", "Password Tidak Boleh Kosong", "error");
      } else {
        dbRef.child("user").orderByChild('email').on("value", function(snapshot) {
          snapshot.forEach(function(child) {
            console.log(child.val())
            if (child.val().email == username) {
              state = true;
            }
          });
          if (state) {
            runAuth()
          } else {
            swal("Error", "Anda Belum Terdaftar", "error");
          }
        }, function(errorObject) {
          console.log(errorObject)
        });
      }

      function runAuth() {
        firebase.auth().signInWithEmailAndPassword(username, password)
          .then((userCredential) => {
            // Signed in
            var user = userCredential.user;
            var userId = user.uid
            console.log(userId)
            // window.location.href = "./index.php";
            $("#menuGuest").addClass("d-none");
            $("#menuUser").removeClass("d-none");
            dbRef.child("user").child(userId).get().then((snapshot) => {
              if (snapshot.exists()) {
                if (snapshot.val().status == "unverified") {
                  firebase.auth().signOut().then(function() {
                    swal("Error", "Akun Anda Belum Diverifikasi Oleh Admin", "error");
                  }).catch(function(error) {
                    // An error happened.
                  });
                } else {
                  location.href = "./index.php"
                }
              }
            })
          })
          .catch((error) => {
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log(errorMessage);
            if (username.trim() == "" || password.trim() == "") {
              swal("Error", "Email dan Password Tidak Boleh Kosong", "error");
            } else {
              swal("Error", "Password Anda Salah", "error");
            }
          });
      }

      function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
      }

    })

    $("#menuUser").addClass("d-none")
    $("#menuGuest").removeClass("d-none")


    //==================

    $("#showPassword").on('click',function() {
			var $pwd = $("#inputPassword");
			if ($pwd.attr('type') === 'password') {
				$pwd.attr('type', 'text');
        $("#iconShowPassword").removeClass("fa-eye");
        $("#iconShowPassword").addClass("fa-eye-slash");
			} else {
				$pwd.attr('type', 'password');
        $("#iconShowPassword").removeClass("fa-eye-slash");
        $("#iconShowPassword").addClass("fa-eye");
			}
		});

    $("#buttonSearch").click(function (e) {
        e.preventDefault()
        var search = $("#inputSearch").val();
        location.href = "./search.php?search=" + search;
    })

  </script>

</body>

</html>