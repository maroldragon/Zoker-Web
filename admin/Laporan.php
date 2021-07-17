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

	<title>Blank Page | AdminKit Demo</title>

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

					<h1 class="h3 mb-3">Data Laporan</h1>
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<form>
									<div class="form-group row">
										<label class="col-form-label col-sm-2 text-sm-right">Jenis Laporan</label>
										<div class="col-md-3 ">
																				
											<select class="form-control  mb-0" >
												<option>Buku</option>
												<option>Data Member</option>
												<option>Data ....</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-sm-2 text-sm-right">Tanggal Awal</label>
										<div class="col-md-3 ">
											<input type="Date" class="form-control" placeholder="Date">											
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-sm-2 text-sm-right">Tanggal Akhir</label>
										<div class="col-md-3 ">
											<input type="Date" class="form-control" placeholder="Date">
										</div>
									</div>																	
								</form>
								<nav class="navbar ">
									<div class="">
                                        <button class="btn btn-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16">
                                                <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                                              </svg>
                                            <span> Tampilkan</span>	
                                        </button>
                                        <button class="btn btn-info" onclick="window.print()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                              </svg>
                                            <span> Cetak</span>	
                                        </button>
                                    </div>
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
								</nav>									
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
											<th scope="col">Kode Penawaran</th>
											<th scope="col">Nama Peminjam</th>
											<th scope="col">Buku Dipinjam</th>
											<th scope="col">Tanggal Pinjam</th>
											<th scope="col">Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">1</th>
											<td>Cell</td>
											<td>Cell</td>
											<td>Cell</td>
											<td>Cell</td>
											<td>Cell</td>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>Cell</td>
											<td>Cell</td>
											<td>Cell</td>
											<td>Cell</td>
											<td>Cell</td>
										</tr>
										<tr>
											<th scope="row">3</th>
											<td>Cell</td>
											<td>Cell</td>
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