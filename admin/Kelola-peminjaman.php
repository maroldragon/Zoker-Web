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

	<title>Kelola Peminjaman</title>

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
					
					<!--isi konten-->
					
					<h1 class="h3 mb-3">Data Peminjaman</h1>
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<form>
									<div class="form-group row">
										<label class="col-form-label col-sm-2 text-sm-right">Tanggal Awal</label>
										<div class="col-md-3">
											<input type="Date" class="form-control" placeholder="Date">											
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-sm-2 text-sm-right">Tanggal Akhir</label>
										<div class="col-md-3">
											<input type="Date" class="form-control" placeholder="Date">
										</div>
									</div>								
									<div class="form-group row">
										<label class="col-form-label col-sm-2 text-sm-right">Urutkan</label>
										<div class="col-md-3">									
											<select class="form-control  mb-3">
												<option>Urutkan Berdasarkan</option>
												<option>Nama Peminjaman A-Z</option>
												<option>Peminjaman Terbaru</option>
												</select>
										</div>
									</div>								
								</form>
								<nav class="navbar ">
									<button class="btn btn-primary">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
											<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
											<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
										  </svg>
										<span> Tampilkan</span>	
									</button>
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
								<table id="printTable"  class="table mb-0">
									<thead id="data-table-head" class="data-table-head">
										
									</thead>
									<tbody id="data-table-pinjam" class="data-table-user"> 
									
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
<script>

SelectAllData()
		function SelectAllData(){
			
			//create table row
			document.getElementById("data-table-pinjam").style.textAlign = "left";
			document.getElementById("data-table-head").style.textAlign = "left";
			var thead = document.getElementById("data-table-head");
			var trow = document.createElement("tr");
			var td1 = document.createElement("th");
			var td2 = document.createElement("th");
			var td3 = document.createElement("th");
			var td4 = document.createElement("th");
			var td5 = document.createElement("th");
			td1.innerHTML = "idBuku";
			td2.innerHTML = "idPeminjaman";
			td3.innerHTML = "idUser";
			td4.innerHTML = "status";
			td5.innerHTML = "tanggal";
			
			trow.appendChild(td1);
			trow.appendChild(td2);
			trow.appendChild(td3);
			trow.appendChild(td4);
			trow.appendChild(td5);

			thead.appendChild(trow)
			//end table row

			firebase.database().ref("peminjaman").once("value", function(allRecord){
				allRecord.forEach( function(currentRecord) {
					
					var judul = currentRecord.val().idBuku
					var isbn = currentRecord.val().idPeminjaman
					var kategori = currentRecord.val().idUser
					var penerbit = currentRecord.val().status
					var penulis = currentRecord.val().tanggal
					addItemToTable(isbn,judul,kategori,penulis,penerbit);
				})
			});
		}
		var usrNo = 0;
		//AddItemToTable()
		function addItemToTable(usrname, name, mail, loc){
			
			var tbody = document.getElementById("data-table-pinjam");
			var trow = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");
			

			td1.innerHTML = ++usrNo;
			td2.innerHTML = usrname;
			td3.innerHTML = name;
			td4.innerHTML = mail;
			td5.innerHTML = loc;

			trow.appendChild(td1);
			trow.appendChild(td2);
			trow.appendChild(td3);
			trow.appendChild(td4);
			trow.appendChild(td5);

			tbody.appendChild(trow)
		}

</script>

</body>

</html>