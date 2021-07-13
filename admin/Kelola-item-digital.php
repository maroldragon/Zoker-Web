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

	<title>Kelola Item Digital</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="css/app.css" rel="stylesheet">
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
					<h1 class="h3 mb-3"><strong>Data</strong> Buku</h1>
					<div class="card-header">
						<div class="mb-0">
							<nav class="navbar ">
								<form method="get" action="Kelola-item-digital-add.php?kelola_item">
									<button class="btn btn-primary" type="submit">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
											<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
											<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
										</svg>
										<span> Tambah Buku</span>
									</button>
								</form>
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
					<!--Data Buku-->
					<div class="col-12 ">
						<div class="card flex-fill">
							<div class="card-header">
								<h5 class="card-title mb-0">Data Buku</h5>
							</div>
							<table class="table table-hover my-0">
								<thead>
									<tr>
										<th>No</th>
										<th>ISBN</th>
										<th>Judul Buku</th>
										<th>Kategori</th>
										<th>Penulis</th>
										<th>Penerbit</th>
									</tr>
								</thead>
								<tbody id="data-table-book">
									
								</tbody>
							</table>
						</div>
					</div>
					<!--Button Bar-->
					<div class="row">
						<div class="col-md-12 text-center">
							<div class="btn-group btn-group ">
								<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
									<div class="btn-group mr-2" role="group" aria-label="First group">
										<button type="button" class="btn btn-secondary ">Previous</button>
										<button type="button" class="btn btn-secondary active">1</button>
										<button type="button" class="btn btn-secondary">2</button>
										<button type="button" class="btn btn-secondary">3</button>
										<button type="button" class="btn btn-secondary">4</button>
										<button type="button" class="btn btn-secondary ">Next</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<p class="mb-0">
						<a href="index.html" class="text-muted"><strong>Perpustakaan Digital</strong></a> &copy;
					</p>
				</div>
			</footer>
		</div>
	</div>

	<?php
		@include_once("sourceJS.html");
	?>
	<script src="js/app.js"></script>
	<script src="js/custom.js"></script>
	<script>
		const dbRef = firebase.database().ref("books");
		var no = 0;
		dbRef.once('value', function(allRecord){
			allRecord.forEach( function(currentRecord) {
				var judul = currentRecord.val().judul
				var isbn = currentRecord.val().isbn
				var kategori = currentRecord.val().kategori
				var penerbit = currentRecord.val().penerbit
				var penulis = currentRecord.val().penulis
				var tahunTerbit = currentRecord.val().tahunTerbit
				var deskripsi = currentRecord.val().deskripsi
				var file  = currentRecord.val().file
				var cover  = currentRecord.val().cover
				addDataToTable(isbn, judul, kategori, penerbit, penulis, tahunTerbit, deskripsi, file, cover)
			})
		});

		function addDataToTable(isbn, judul, kategori, penerbit, penulis, tahunTerbit, deskripsi, file, cover){
			console.log(isbn)
			var dataTable = document.getElementById("data-table-book");
			var trow = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");
			var td6 = document.createElement("td");

			td1.innerHTML = ++no;
			td2.innerHTML = isbn;
			td3.innerHTML = judul;
			td4.innerHTML = kategori;
			td5.innerHTML = penulis;
			td6.innerHTML = penerbit;

			trow.appendChild(td1);
			trow.appendChild(td2);
			trow.appendChild(td3);
			trow.appendChild(td4);
			trow.appendChild(td5);
			trow.appendChild(td6);

			dataTable.appendChild(trow);
		}


		const dbRet = firebase.database().ref("books");
		var no = 0;
		dbRet.orderByValue("judul", ).once('value', function(allRecord){
			allRecord.forEach( function(currentRecord) {
				console.log(currentRecord.val());
			})
		});

	</script>

</body>

</html>