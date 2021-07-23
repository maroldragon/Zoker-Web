<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Admin | Login</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Selamat Datang </h1>
							<p class="lead">
								Silahkan Login Sebagai Admin
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="row">
										<div class="col-md-6">
											<img src="./img/login_img.jpg" alt="" class="img-fluid" width="100%" height="auto" />
										</div>
										<div class="col-md-6">
											<div class="ms-0 mb-2">
												<label class="form-label mb-0">Email</label>
												<input class="form-control form-control-lg mt-0" type="email" name="email" id="email" placeholder="Enter your email" />
											</div>
											<div class="ms-0 mb-2">
												<label class="form-label mb-0">Password</label>
												<div class="input-group mt-0">
													<input class="form-control form-control-lg pwd" type="password" name="password" id="password" placeholder="Enter your password" />
													<button class="btn btn-primary btn-form" type="button" id="showPassword">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
															<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
															<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
														</svg>
													</button>
												</div>
											</div>
											<div class="ms-0 mb-3">
												<a class="btn btn-primary form-control" id="btnLogin">Sign in</a>
											</div>

											<div class="ms-0 mb-3">
											<a href="../login.php" class="btn btn-secondary form-control">Login Sebagai Member</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<?php
	@include_once("sourceJS.html");
	?>

	<script src="js/app.js"></script>
	<script>
		$("#btnLogin").click(function(event) {
			event.preventDefault()
			const dbRef = firebase.database().ref();
			let email = $("#email").val()
			let password = $("#password").val();
			//console.log(username)
			var state = false
			if (email.trim() == "" && password == "") {
				swal("Error", "Email dan Password Tidak Boleh Kosong", "error");
			} else if (email.trim() == "") {
				swal("Error", "Email Tidak Boleh Kosong", "error");
			}else if(!validateEmail(email)) {
				swal("Error", "Format Email Salah", "error");
			}else if (password.trim() == "") {
				swal("Error", "Password Tidak Boleh Kosong", "error");
			} else {
				dbRef.child("admin").orderByChild('email').on("value", function(snapshot) {
				snapshot.forEach(function(child) {
					console.log(child.val())
					if (child.val().email == email) {
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
				firebase.auth().signInWithEmailAndPassword(email, password)
				.then((userCredential) => {

					var user = userCredential.user;
					console.log(user)
					window.location.href = "./index.php?home";
					// ...
				})
				.catch((error) => {
					var errorCode = error.code;
					var errorMessage = error.message;
					console.log(errorMessage);
					swal("Error", "Password Anda Salah", "error");
				});
			}

		})
		//----------------------------------------------//
		//show hide password
		$("#showPassword").on('click',function() {
			var $pwd = $(".pwd");
			if ($pwd.attr('type') === 'password') {
				$pwd.attr('type', 'text');
			} else {
				$pwd.attr('type', 'password');
			}
		});
		//--------------------------------------------------//
		//empty from

		function validateEmail(email) {
			const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(String(email).toLowerCase());
		}

	</script>

</body>

</html>