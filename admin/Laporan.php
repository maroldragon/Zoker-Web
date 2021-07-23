<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Admin | Laporan</title>

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

					<h1 class="h3 mb-3"><strong>Data</strong> Laporan</h1>
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<form>
									<div class="form-group row">
										<label class="col-form-label col-sm-2 text-sm-right">Jenis Laporan</label>
										<div class="col-md-3 ">
											<select id="jenisLaporan" class="form-control  mb-0" >
												<option value="buku">Buku</option>
												<option value="member">Member</option>
												<option value="peminjaman">Peminjaman</option>
											</select>
										</div>
									</div>
									<!-- <div class="form-group row">
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
									</div>					 -->
								</form>
								<nav class="navbar ">
									<div class="">
                                        <button id="btn-tampilan" class="btn btn-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16">
                                                <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                                              </svg>
                                            <span> Tampilkan</span>	
                                        </button>
                                        <button id="print" class="btn btn-info" onclick="printDiv()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                              </svg>
                                            <span> Cetak</span>	
                                        </button>
                                    </div>
									<!-- <form  class="mt-3 mb-3" class="form-inline d-sm-inline-flex">
										<div class="input-group input-group-navbar">
											<input id="searchBooklist" type="text" class="form-control" placeholder="Search…" aria-label="Search">
											<div class="input-group-append">
												<button id="btnSearchBooklist" class="btn btn-primary" type="button">
													<i class="align-middle" data-feather="search"></i>
												</button>
											</div>
										</div>
									</form> -->
								</nav>
							</div>
						</div>
					</div>
					<!--Data buku-->
					<div class="col-12" id="wrap-book">
						<div class="card">
							<div  class="table-responsive">								
								<table id="printTableBuku"  class="table mb-0">
									<thead id="data-table-heads" class="data-table-head">
										<tr>
											<th>No</th>
											<th>ISBN</th>
											<th>Judul</th>
											<th>Kategori</th>
											<th>Penulis</th>
											<th>Penerbit</th>
										</tr>
									</thead>
									<tbody id="data-table-book" class="data-table-book"> 

									</tbody>
								</table>
							</div>
							
						</div>
					</div>


					<!--Data Member-->
					<div class="col-12 d-none" id="wrap-user">
						<div class="card">
							<div  class="table-responsive">								
								<table id="printTableUser"  class="table mb-0">
									<thead id="data-table-heads" class="data-table-head">
										<tr>
												<th>No</th>
												<th>Username</th>
												<th>Nama</th>
												<th>Email</th>
												<th>Alamat</th>
											</tr>
									</thead>
									<tbody id="data-table-user" class="data-table-user"> 

									</tbody>
								</table>
							</div>
							
						</div>
					</div>

					<!--Data Peminjaman-->
					<div class="col-12 d-none" id="wrap-peminjaman">
						<div class="card">
							<div  class="table-responsive">								
								<table id="printTablePinjam"  class="table mb-0">
									<thead id="data-table-heads" class="data-table-head">
										<tr>
											<th>No</th>
											<th>Kode Peminjaman</th>
											<th>ID User</th>
											<th>ISBN Buku</th>
											<th>Tanggal</th>
										</tr>
									</thead>
									<tbody id="data-table-peminjaman" class="data-table-peminjaman"> 

									</tbody>
								</table>
							</div>
							
						</div>
					</div>

					<!--Button Bar-->
					<div class="row">
						<div class="col-md-12 text-center">
							<div class="btn-group btn-group ">
								<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
									<div id="btn-pagination-list-book" class="btn-group mr-2" role="group" aria-label="First group">
										<!-- <button type="button" class="btn btn-secondary ">Previous</button>
										<button type="button" class="btn btn-secondary active">1</button>
										<button type="button" class="btn btn-secondary">2</button>
										<button type="button" class="btn btn-secondary">3</button>
										<button type="button" class="btn btn-secondary">..</button>
										<button type="button" class="btn btn-secondary">4</button>
										<button type="button" class="btn btn-secondary ">Next</button> -->
									</div>
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
	<?php
		@include_once("sourceJS.html");
	?>
	<script src="js/custom.js"></script>
	<script>
		 //function printDiv() {
         //window.frames["print_frame"].document.body.innerHTML = document.getElementById("data").innerHTML;
         //window.frames["print_frame"].window.focus();
         //window.frames["print_frame"].window.print();
       	//}
		//Print data laporan
			

		   function printData()
			{
				var divToPrint=document.getElementById("printTableUser");
				newWin= window.open("");
				newWin.document.write(divToPrint.outerHTML);
				newWin.print();
				//newWin.close();
			}

			$('#print').on('click',function(){
				printData();
			})
		//Cari buku

		$("#btnSearchBooklist").click(function(e){
			e.preventDefault();
			var keyword = $("#searchBooklist").val()
			addData(keyword);
		})

		$("#searchBooklist").keydown(function(e) {
			if(event.keyCode == 13) {
				var keyword = $("#searchBooklist").val()
				addData(keyword);
			}
		})

		$(window).keydown(function(event){
			if(event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});
		
		/*########################################
					AddItemToTableUser
		#########################################*/

		SelectAllDataMember()
		function SelectAllDataMember(){
			
			firebase.database().ref("user").once("value", function(allRecord){
				allRecord.forEach( function(currentRecord) {
					var username = currentRecord.val().userName;
					var name = currentRecord.val().namaDepan;
					var mail = currentRecord.val().email;
					var alamat = currentRecord.val().alamat;
					addItemToTableUser(username, name, mail, alamat);
				})
			});
		}

		var userNo = 0;
		function addItemToTableUser(username, name, mail, alamat){
			
			var tbody = document.getElementById("data-table-user");
			var trow = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");
			
			td1.innerHTML = ++userNo;
			td2.innerHTML = username;
			td3.innerHTML = name;
			td4.innerHTML = mail;
			td5.innerHTML = alamat;

			trow.appendChild(td1);
			trow.appendChild(td2);
			trow.appendChild(td3);
			trow.appendChild(td4);
			trow.appendChild(td5);

			tbody.appendChild(trow)	
		}

		/*########################################
					AddItemToTableBook
		#########################################*/
		SelectAllDataBook()
		function SelectAllDataBook(){
			
			//create table row
			document.getElementById("data-table-book").style.textAlign = "left";
			document.getElementById("data-table-heads").style.textAlign = "left";

			firebase.database().ref("books").once("value", function(allRecord){
				allRecord.forEach( function(currentRecord) {
					
					var judul = currentRecord.val().judul
					var isbn = currentRecord.val().isbn
					var kategori = currentRecord.val().kategori
					var penerbit = currentRecord.val().penerbit
					var penulis = currentRecord.val().penulis
					addItemToTableBuku(isbn,judul,kategori,penulis,penerbit);
				})
			});
		}
		//AddItemToTable()
		var bookNo = 0
		function addItemToTableBuku(isbn,judul,kategori,penulis,penerbit){
			var tbody = document.getElementById("data-table-book");
			var trow = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");
			var td6 = document.createElement("td");
			
			td1.innerHTML = ++bookNo;
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

			tbody.appendChild(trow)
		}

		/*########################################
				AddItemToTablePeminjaman
		#########################################*/

		SelectAllDataPinjam()
		function SelectAllDataPinjam(){
			
			firebase.database().ref("peminjaman").orderByChild("tanggal").once("value", function(allRecord){
				allRecord.forEach( function(currentRecord) {
					var idUser = currentRecord.val().idUser;
					var isbn = currentRecord.val().idBuku;
					var idPeminjaman = currentRecord.val().idPeminjaman;
					var tanggal = currentRecord.val().tanggal;
					addItemToTablePinjam(idUser, isbn, idPeminjaman, tanggal);
				})
			});
		}

		var pinjamNo = 0;
		function addItemToTablePinjam(idUser, isbn, idPeminjaman, tanggal){
			
			var tbody = document.getElementById("data-table-peminjaman");
			var trow = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");
			
			td1.innerHTML = ++pinjamNo;
			td2.innerHTML = idPeminjaman;
			td3.innerHTML = idUser;
			td4.innerHTML = isbn;
			td5.innerHTML = tanggal;

			trow.appendChild(td1);
			trow.appendChild(td2);
			trow.appendChild(td3);
			trow.appendChild(td4);
			trow.appendChild(td5);

			tbody.appendChild(trow)	
		}


		$("#btn-tampilan").click(function() {
			var jenisLaporan = $("#jenisLaporan").val()
			if(jenisLaporan == "buku") {
				console.log(jenisLaporan)
				$("#wrap-book").removeClass("d-none");
				$("#wrap-user").addClass("d-none");
				$("#wrap-peminjaman").addClass("d-none");
			}else if(jenisLaporan == "member") {
				console.log(jenisLaporan)
				$("#wrap-book").addClass("d-none");
				$("#wrap-user").removeClass("d-none");
				$("#wrap-peminjaman").addClass("d-none");
			}else if(jenisLaporan== "peminjaman") {
				$("#wrap-book").addClass("d-none");
				$("#wrap-user").addClass("d-none");
				$("#wrap-peminjaman").removeClass("d-none");	
			}
		})


	</script>
</body>

</html>