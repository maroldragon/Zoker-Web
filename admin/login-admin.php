<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="Zoker">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Sign In Admin Perputakaan Digital</title>

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
											<img src="img/avatars/avatar.jpg" alt="" class="img-fluid rounded-circle" width="132" height="132" />
										</div>
										<div class="col-md-6">
											<div class="ms-0">
												<label class="form-label mb">Email</label>
												<input class="form-control form-control-lg" type="email" name="email" id="email" placeholder="Enter your email" />
											</div>
											<div class="ms-0 ">
												<label class="form-label">Password</label>
												<div class="input-group">
													<input class="form-control form-control-lg pwd" type="password" name="password" id="password" placeholder="Enter your password" />
													<button class="btn btn-primary" type="button">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill reveal" viewBox="0 0 16 16">
															<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
															<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
														</svg>
													</button>
												</div>
												<!-- <small>
												<a href="pages-reset-password.html">Forgot password?</a>
												</small> -->
											</div>
										</div>
									</div>
									<form>
										<div>
											<!-- <label class="form-check">
												<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
												<span class="form-check-label">
													Remember me next time
												</span>
											</label> -->
										</div>
										<div class="text-center mt-3">
											<a class="btn btn-lg btn-primary" id="btnLogin">Sign in</a>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
										</div>
									</form>
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
			let email = $("#email").val()
			let password = $("#password").val();

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
				});
		})
		//----------------------------------------------//
		//show hide password
		$(".reveal").on('click', function() {
			var $pwd = $(".pwd");
			if ($pwd.attr('type') === 'password') {
				$pwd.attr('type', 'text');
			} else {
				$pwd.attr('type', 'password');
			}
		});

		//--------------------------------------------------//
		//empty from
	</script>

</body>

</html>