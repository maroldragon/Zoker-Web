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

	<title>Pengujian</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
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
					
					
					<!--Konten-->
					<h1 class="h3 mb-3">Data Laporan</h1>
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<form>
									<div class="form-group nav">
										<div class="col-md-6 nav">
											<div class="col-md-3">
												<label class="col-form-label  text-sm-right">Jenis Pengujian</label>
											</div>
											<div class="col-md-6 ">
												<select class="form-control">
													<option selected="">Pilih Metode Pengujian</option>
													<option>MAE</option>
													<option>RMSE</option>
												</select>												
												<div class="card mt-3 ">
													<button class="btn btn-primary">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
															<path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
															<path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/>
														  </svg>
														<span> Hitung Pengujian</span>	
													</button>
												</div>
											</div>										
										</div>
										<div class="col-md-4 offset-2">
											<form class="form-inline d-sm-inline-flex">
												<div class="input-group input-group-navbar">
													<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
													<div class="input-group-append">
														<button class="btn" type="button">
													<i class="align-middle" data-feather="search"></i>
													</button>
													</div>
												</div>
											</form>
										</div>
									</div>																										
								</form>																	
							</div>							
						</div>											
					</div>

					<div class="col-12">
						<div class="card">
							<div class="table-responsive">
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Tanggal Pengujian</th>
											<th scope="col">Jenis Pengujian</th>
											<th scope="col">Hasil</th>											
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">1</th>
											<td>Cell</td>
											<td>Cell</td>
											<td>Cell</td>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>Cell</td>
											<td>Cell</td>
											<td>Cell</td>											
										</tr>
										<tr>
											<th scope="row">3</th>
											<td>Cell</td>
											<td>Cell</td>
											<td>Cell</td>
										</tr>
									</tbody>
								</table>
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

	<script src="js/app.js"></script>
	<script src="js/vendor.js"></script>
<?php
	@include_once("sourceJS.html");
?>
<script src="js/app.js"></script>
<script src="js/custom.js"></script>
</body>

</html>