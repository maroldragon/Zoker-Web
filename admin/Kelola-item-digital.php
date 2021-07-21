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
					<div class="card-header p-0">
						<div class="mb-0">
							<nav class="navbar p-3">
								<form class="mt-3 mb-3" method="get" action="Kelola-item-digital-add.php?kelola_item">
									<button class="btn btn-primary" type="submit">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
											<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
											<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
										</svg>
										<span> Tambah Buku</span>
									</button>
								</form>
								<form class="mt-3 mb-3" class="form-inline d-sm-inline-flex">
									<div class="input-group input-group-navbar">
										<input id="searchBooklist" type="text" class="form-control" placeholder="Search…" aria-label="Search">
										<div class="input-group-append">
											<button id="btnSearchBooklist" class="btn btn-primary" type="button">
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
										<th>Aksi</th>
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
			
			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							...
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>

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
		var dataBook = [];
		var dataBookSearch = [];
		var tampil = 5;
		var currentPage = 1;
		var allPage = 1;
		addData("");

		function addData(keyword) {
			dataBook = []
			dbRef.orderByChild("judul").once('value', function(allRecord) {
				allRecord.forEach(function(currentRecord) {
					dataBook.push(currentRecord);
				})
			}).then(() => {
				var sum = generateData(keyword);
				addPagination(sum);
				tampilkan();
			});
		}

		function generateData(keyword) {
			dataBookSearch = [];
			for (ids = 0; ids < dataBook.length; ids++) {
				if ((dataBook[ids].val().judul).toLowerCase().includes(keyword.toLowerCase())) {
					dataBookSearch.push(dataBook[ids]);
				}
			}
			return dataBookSearch.length;
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

			var dataTable = document.getElementById("data-table-book");
			dataTable.innerHTML = "";
			no = (startAt - 1) * tampil;
			startAt = (startAt - 1) * tampil
			var endAt = (startAt + tampil);
			if (endAt > dataBookSearch.length) {
				endAt = dataBookSearch.length
			}

			for (var i = startAt; i < endAt; i++) {
				addDataToTable(dataBookSearch[i])
			}
		}

		function addDataToTable(currentRecord) {
			var judul = currentRecord.val().judul
			var isbn = currentRecord.val().isbn
			var kategori = currentRecord.val().kategori
			var penerbit = currentRecord.val().penerbit
			var penulis = currentRecord.val().penulis
			var tahunTerbit = currentRecord.val().tahunTerbit
			var deskripsi = currentRecord.val().deskripsi
			var file = currentRecord.val().file
			var cover = currentRecord.val().cover
			var dataTable = document.getElementById("data-table-book");
			var trow = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");
			var td6 = document.createElement("td");
			var td7 = document.createElement("td");

			td1.innerHTML = ++no;
			td2.innerHTML = isbn;
			td3.innerHTML = judul;
			td4.innerHTML = kategori;
			td5.innerHTML = penulis;
			td6.innerHTML = penerbit;
			// td7.innerHTML = `<a href='Kelola-item-digital-edit.php?isbn=${isbn}' class='btn btn-danger'>Delete</a></div>`;
			td7.innerHTML = `
				<div class='d-flex'>
					<a href='Kelola-item-digital-edit.php?isbn=${isbn}' class='btn btn-primary'>Update</a>&nbsp;
					<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
						<button class="btn btn-danger">
							hapus
						</button>
					</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
					<div class="dropdown-menu-header">
						<div class="position-relative">
							Anda Yakin?
						</div>
					</div>
					<div class="list-group">
						<span class="list-group-item">
							<div class="navbar">
								<form>
									<span>Hapus Buku</span>
								</form>
									<button onclick="hapusBuku('${isbn}')" id="btnHapusBook${isbn}" class="btn btn-danger">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
											<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
											<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
										</svg>
										<span>Hapus</span>
									</button>
							</div>
						</span>
					</div>
				</div>`

			trow.appendChild(td1);
			trow.appendChild(td2);
			trow.appendChild(td3);
			trow.appendChild(td4);
			trow.appendChild(td5);
			trow.appendChild(td6);
			trow.appendChild(td7);

			dataTable.appendChild(trow);
		}

		function addPagination(sumData) {
			var sumPage = Math.ceil(sumData / tampil);
			allPage = sumPage;
			var pagination = document.getElementById("btn-pagination-list-book");
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

		$("#btnSearchBooklist").click(function(e) {
			e.preventDefault();
			var keyword = $("#searchBooklist").val()
			addData(keyword);
		})

		$("#searchBooklist").keydown(function(e) {
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

		$('#btnHapusBook').click(function(e){
			e.preventDefault()
		})
	</script>

</body>

</html>