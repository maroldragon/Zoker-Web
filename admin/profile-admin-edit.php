<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Profile | AdminKit Demo</title>
	
	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	
</head>

<body>
	<div class="wrapper">
		<?php
			@include_once("navigasi.php");
		?>

		<div class="main">
			<?php
				@include_once("header.php");
			?>

			<main class="content">
				<div class="container-fluid p-0">
					<div class="mb-8">
						<h1 class="h3 d-inline align-middle"> <strong>Edit</strong> Profile</h1>
					</div>
					<div class="card-header">
							<div class="mb-0">
								<nav class="navbar p-0 mt-2">
									<a class="btn btn-secondary" type="submit" href="profile-admin.php?profile">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
											<path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
											<path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z" />
										</svg>
										<span>Kembali</span>
									</a>
								</nav>
							</div>
						</div>
					<div class="row">
						<div class="col-md-12 col-xl-12">
							<div class="card mb-8">								
								<div class="card-body text-center">
									<div class="avatar-upload">
										<div class="avatar-edit">
											<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
											<label for="imageUpload"></label>
										</div>
										<div class="avatar-preview">
											<div id="imagePreview">
											</div>
										</div>
									</div>
								</div>
								<div class="card-body edit-wrapper">
									<div id="myProgress">
										<div id="myBar">10%</div>
									</div>
									<h5 class="h6 card-title">Data Pribadi</h5>
									<div class="col-md-12">
										<div class="form-group">
											<label for="namaDepanText">Nama Depan</label>
											<input type="text" class="form-control" id="namaDepanText" placeholder="">
										</div>
										<div class="form-group">
											<label for="namaBelakangText">Nama Belakang</label>
											<input type="text" class="form-control" id="namaBelakangText" placeholder="">
										</div>
										<div class="form-group">
											<label for="inputAddress">Username</label>
											<input type="text" class="form-control" id="usernameText" placeholder="">
										</div>
										<div class="form-group">
											<label for="inputAddress">Jenis Kelamin</label>
											<select class="form-control  mb-3" id="jenisKelaminText" value="2">
												<option value="laki-laki">Laki-Laki</option>
												<option value="wanita">Wanita</option>
											</select>
										</div>
										<div class="navbar">
											<span>Tempat Lahir</span>
											<form class="form-group col-md-6">												
												<input type="text" class="form-control" id="tempatLahirText" placeholder="">												
											</form>
											<form class="form-group col-md-4">
												<input type="text" class="form-control" id="tanggalLahirText">
											</form>
										</div>
										<div class="form-group">
											<label for="alamatText">Alamat</label>
											<input type="text" class="form-control" id="alamatText" placeholder="">
										</div>
										<div class="form-group">
											<label for="emailText">Email</label>
											<input type="text" class="form-control" id="emailText" placeholder="">
										</div>
									</div>

								</div>
								<div class="card-body navbar">									
									<td class="table-action">
										<a class="nav-icon dropdown-toggle" href="#" id="" data-toggle="dropdown">
											<form>
												<button class="btn btn-primary" id="btn-simpan-profile">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save2" viewBox="0 0 16 16">
														<path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
													  </svg>
													<span>Simpan</span>
												</button>
											</form>
										</a>
									</td>
								</div>	

							</div>
						</div>
					</div>
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-12 text-center">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>Perpustakaan Digital</strong></a> &copy;
							</p>
						</div>						
					</div>
				</div>
			</footer>
		</div>
	</div>

	<div id="overlay-dark"></div>

	<?php
		@include_once("sourceJS.html");
	?>
	<script src="js/app.js"></script>
	<script src="js/custom.js"></script>

	

</body>

</html>