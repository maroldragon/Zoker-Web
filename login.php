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
          <label class="inp-text-label" for="inputUsername">Username</label>
          <input type="text" class="form-control inp-text" id="inputUsername" placeholder="Username">
        </div>
        <div class="mb-2">
          <label class="inp-text-label" for="inputPassword">Password</label>
          <input type="password" class="form-control inp-text" id="inputPassword" placeholder="Password">
        </div>
        <button type="button" class="btn btn-primary form-control mt-3" id="buttonLogin">Masuk</button>
        <button type="button" class="btn btn-secondary form-control mt-3" id="buttonRegister">Daftar</button>
      </div>
    </div>
    <div class="row">
      <div class="col align-self-center">
        <a href="admin/" class="btn btn-link form-control mt-5" id="buttonLoginAdmin">Login Sebagai Admin</a>
      </div>
    </div>
  </div>

  
  <?php
    @include_once('footer.php')
  ?>

<script>
		$("#buttonLogin").click(function(event){
			event.preventDefault()
			let username = $("#inputUsername").val()
			let password = $("#inputPassword").val();
      console.log(username)
			firebase.auth().signInWithEmailAndPassword(username, password)
			.then((userCredential) => {
				// Signed in
				var user = userCredential.user;
				console.log(user)
				window.location.href = "./index.php";
        $("#menuGuest").addClass("d-none");
        $("#menuUser").removeClass("d-none");

				// ...
			})
			.catch((error) => {
				var errorCode = error.code;
				var errorMessage = error.message;
				console.log(errorMessage);
        swal("Error", "Username Dan Password Salah", "error");
			});
		})

    $("#menuUser").addClass("d-none")
    $("#menuGuest").removeClass("d-none")

	</script>
  
</body>
</html>