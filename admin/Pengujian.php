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
												<select id="metodePengujian" class="form-control">
													<option value="">Pilih Metode Pengujian</option>
													<option>MAE</option>
													<option>RMSE</option>
												</select>
												<div class="card mt-3 ">
													<button id="btnHitungPengujian" class="btn btn-primary">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
															<path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
															<path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z" />
														</svg>
														<span> Hitung Pengujian</span>
													</button>
												</div>
											</div>
										</div>
										<div class="col-md-4 offset-2">
											<form class="form-inline d-sm-inline-flex">
												<div class="input-group input-group-navbar">
													<input id="searchPengujianlist" type="text" class="form-control" placeholder="Search" aria-label="Search">
													<div class="input-group-append">
														<button class="btn" type="button" id="btnSearchPengujianlist">
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

					<div class="col-12"  id="pengujianHasil">
						<div class="card">
							<div class="table-responsive">
								<table class="table mb-0">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Tanggal Pengujian</th>
											<th scope="col">Jenis Pengujian</th>
											<th scope="col">Hasil</th>
											<th scope="col">Lihat Proses</th>
										</tr>
									</thead>
									<tbody id="data-table-pengujian">

									</tbody>
								</table>
							</div>
						</div>

						<!--Button Bar-->
						<div class="row">
							<div class="col-md-12 text-center">
								<div class="btn-group btn-group ">
									<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
										<div id="btn-pagination-list-pengujian" class="btn-group mr-2" role="group" aria-label="First group">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Result Pengujian Proses -->
					<div class="container-fluid p-0 d-none" id="pengujianProses">
						<!-- <h1 class="h3 mb-3"><strong>Proses</strong> Pengujian</h1> -->
						<div class="col-12">
							<div class="card-header">
								<div class="mb-0">
									<nav class="navbar p-0 mt-2">
										<a id="btnPengujianProses" class="btn btn-secondary" type="submit">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
												<path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
												<path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z" />
											</svg>
											<span>Kembali</span>
										</a>
									</nav>
								</div>
							</div>
							<!--Data Buku-->
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="navbar p-0 mt-3">
											<a style="text-decoration:none" class="" id="">
												<h5>Tanggal Pengujian : <span id="tanggalPengujian"></span></h4>
												<h5>Jenis Pengujian : <span id="jenisPengujian"></span></h5>
												<h5>Jumlah User : <span id="jumlahUser"></span></h4>
												<h5>Jumlah Item : <span id="jumlahItem"></span></h5>
												<h5>Jumlah Data : <span id="jumlahData"></span></h5>
												<h5  style="line-height : 1.5;text-align:justify">Perhitungan Absolute Error : <br><span id="totalAbsoluteError"></span></h5>
												<h5 style="font-weight:700;font-size:17px" mt-5 mb-4><span id="hasilPengujian"></span></h5>
												<!-- <h5><span id="hasilPengujian"></span></h5> -->
											</a>
										</div>
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
	<script src="js/app.js"></script>
	<script src="js/custom.js"></script>
	<script>
		const dbRef = firebase.database().ref("pengujian");
		var no = 0;
		var dataPengujian = [];
		var dataPengujianSearch = [];
		var tampil = 5;
		var currentPage = 1;
		var allPage = 1;

		addData("");

		function addData(keyword) {
			dataPengujian = []
			dbRef.orderByChild("tanggal").once('value', function(allRecord) {
				allRecord.forEach(function(currentRecord) {
					dataPengujian.push(currentRecord);
				})
			}).then(() => {
				var sum = generateData(keyword);
				addPagination(sum);
				tampilkan();
			});
		}

		function generateData(keyword) {
			dataPengujianSearch = [];
			for (ids = 0; ids < dataPengujian.length; ids++) {
				console.log(dataPengujian[ids].val().hasil);
				if ((dataPengujian[ids].val().jenisPengujian).toLowerCase().includes(keyword.toLowerCase())) {
					dataPengujianSearch.push(dataPengujian[ids]);
				}
			}
			return dataPengujianSearch.length;
		}

		function tampilkan(startAt = 1) {
			currentPage = startAt;
			if (startAt == 1) {
				$("#btn-previous-list-book").addClass("disabled");
			} else {
				$("#btn-previous-list-book").removeClass("disabled");
			}

			if (startAt == allPage) {
				$("#btn-next-list-book").addClass("disabled");
			} else {
				$("#btn-next-list-book").removeClass("disabled");
			}

			var dataTable = document.getElementById("data-table-pengujian");
			dataTable.innerHTML = "";
			no = (startAt - 1) * tampil;
			startAt = (startAt - 1) * tampil
			var endAt = (startAt + tampil);
			if (endAt > dataPengujianSearch.length) {
				endAt = dataPengujianSearch.length
			}

			for (var i = startAt; i < endAt; i++) {
				addDataToTable(dataPengujianSearch[i])
			}
		}

		function addDataToTable(currentRecord) {
			var tanggal = currentRecord.val().tanggal
			var jenis = currentRecord.val().jenisPengujian
			var hasil = currentRecord.val().hasil
			var idPengujian = currentRecord.val().idPengujian
			var dataTable = document.getElementById("data-table-pengujian");
			var trow = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");

			td1.innerHTML = ++no;
			td2.innerHTML = tanggal;
			td3.innerHTML = jenis;
			td4.innerHTML = parseFloat(hasil).toFixed(3);
			td5.innerHTML =
			`<a onclick="tampilkanProsesPengujian('${idPengujian}','${jenis}', '${tanggal}')">
				<button class="btn btn-success" type="submit">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
						<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
						<path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
					</svg>
					<span>Lihat Proses</span>
				</button>
			</a>`

			trow.appendChild(td1);
			trow.appendChild(td2);
			trow.appendChild(td3);
			trow.appendChild(td4);
			trow.appendChild(td5);

			dataTable.appendChild(trow);
		}

		function addPagination(sumData) {
			var sumPage = Math.ceil(sumData / tampil);
			allPage = sumPage;
			var pagination = document.getElementById("btn-pagination-list-pengujian");
			pagination.innerHTML = "";
			pagination.innerHTML = "<button id='btn-previous-list-book' type='button' class='btn btn-secondary disabled'>Previous</button>"

			for (var page = 1; page <= sumPage; page++) {
				if (page == sumPage) {
					pagination.innerHTML += "<button id='btnPageTitik' type='button' class='btn btn-secondary btnPage disabled'>" + "..." + "</button>"
					pagination.innerHTML += "<button id='btnPage" + page + "' onclick='changePage(" + page + ")' " + "type='button' class='btn btn-secondary btnPage'>" + page + "</button>"
				} else {
					pagination.innerHTML += "<button id='btnPage" + page + "' onclick='changePage(" + page + ")' " + "type='button' class='btn btn-secondary btnPage'>" + page + "</button>"
				}
			}

			pagination.innerHTML += "<button id='btn-next-list-book' type='button' class='btn btn-secondary'>Next</button>"
			$("#btnPage1").addClass("active");
			$("#btn-previous-list-book").click(function() {
				if ($("#btnPage" + (currentPage - 1)).hasClass("d-none")) {
					$("#btnPage" + (currentPage - 1)).removeClass("d-none");
					$("#btnPage" + (currentPage + 2)).addClass("d-none");
					if (currentPage - 1 == 1) {
						$("#btnPageTitik").removeClass("d-none");
					}
				}
				changePage(currentPage - 1)
			})
			$("#btn-next-list-book").click(function() {
				if ($("#btnPage" + (currentPage + 1)).hasClass("d-none")) {
					$("#btnPage" + (currentPage + 1)).removeClass("d-none");
					$("#btnPage" + (currentPage - 2)).addClass("d-none");
					if (currentPage + 2 == sumPage) {
						$("#btnPageTitik").addClass("d-none");
					}
				}
				changePage(currentPage + 1)
			})

			if (sumPage < 5) {
				$("#btnPageTitik").addClass("d-none");
			} else {
				for (var j = sumPage - 1; j > 3; j--) {
					$("#btnPage" + j).addClass("d-none");
				}
			}
		}

		function changePage(num) {
			offBtnPage();
			$("#btnPage" + num).addClass("active");
			tampilkan(num);
		}

		function offBtnPage() {
			var btnPages = document.querySelectorAll(".btnPage");
			btnPages.forEach(function(btn) {
				btn.classList.remove("active");
			})
		}

		$("#btnSearchPengujianlist").click(function(e) {
			e.preventDefault();
			var keyword = $("#searchPengujianlist").val()
			console.log(keyword)
			addData(keyword);
		})

		$("#searchPengujianlist").keydown(function(e) {
			if (event.keyCode == 13) {
				var keyword = $("#searchBooklist").val()
				addData(keyword);
			}
		})

		$(window).keydown(function(event) {
			if (event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});

		$("#btnPengujianProses").click(function() {
			$("#pengujianProses").addClass("d-none");
			$("#pengujianHasil").removeClass("d-none");
		})

		$("#btnHitungPengujian").click(function(e) {
			e.preventDefault()
			idPengujian = guid()
			var metode = $("#metodePengujian").val()
			if(metode == "") {
				console.log(metode + "sde")
				swal("Error", "Silahkan Pilih Metode Terlebih Dahulu", "error")
			}else {
				addPengujian(metode, idPengujian)
			}
		})

		let guid = () => {
			let s4 = () => {
				return Math.floor((1 + Math.random()) * 0x10000)
					.toString(16)
					.substring(1);
			}
			//return id of format 'aaaaaaaa'-'aaaa'-'aaaa'-'aaaa'-'aaaaaaaaaaaa'
			return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
		}

	</script>
</body>

</html>