<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Admin | Feedback</title>

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
					<h1 class="h3 mb-3"> <strong>Feedback</strong></h1>
					<div class="col-12">
						<div class="card-header">
							<div class="mb-0">
								<nav class="navbar ">
									<form method="get" action="feedback.php?feedback">
										<button id="print" class="btn btn-secondary" type="submit">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
												<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
												<path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
											</svg>
											<span> Export Pdf</span>
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
						<!--table-->
						<div class="col-12">
							<div class="card flex-fill">
								<div class="card-header">
									<table id="printTable" class="table table-hover my-0">
										<thead id="data-table-feed" class="data-table-head">
										
										</thead>
										<tbody id="data-table-feeds" class="data-table-user"> 
										
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
										<div id="btn-pagination-list-feeds" class="btn-group mr-2" role="group" aria-label="First group">
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
	<script src="js/custom-user.js"></script>
	<script>
		function printData()
		{
			var divToPrint=document.getElementById("printTable");
			newWin= window.open("");
			newWin.document.write(divToPrint.outerHTML);
			newWin.print();
			// newWin.close(location.href = "feedback.php?feedback");
		
		}

		$('#print').on('click',function(){
			printData();
		})
		//=============================================================//



		// SelectAllData()
		// function SelectAllData(){
			
		// 	//create table row
		// 	document.getElementById("data-table-feeds").style.textAlign = "left";
		// 	document.getElementById("data-table-feed").style.textAlign = "left";
		// 	var thead = document.getElementById("data-table-feed");
		// 	var trow = document.createElement("tr");
		// 	var td1 = document.createElement("th");
		// 	var td2 = document.createElement("th");
		// 	var td3 = document.createElement("th");
		// 	var td4 = document.createElement("th");
		// 	var td5 = document.createElement("th");
		// 	td1.innerHTML = "No";
		// 	td2.innerHTML = "ID FeedBack";
		// 	td3.innerHTML = "Nama";
		// 	td4.innerHTML = "Email";
		// 	td5.innerHTML = "Pesan";
			
		// 	trow.appendChild(td1);
		// 	trow.appendChild(td2);
		// 	trow.appendChild(td3);
		// 	trow.appendChild(td4);
		// 	trow.appendChild(td5);

		// 	thead.appendChild(trow)
		// 	//end table row

		// 	firebase.database().ref("feedback").once("value", function(allRecord){
		// 		allRecord.forEach( function(currentRecord) {
		// 			var idFeedback = currentRecord.val().feebackId
		// 			var nama = currentRecord.val().nama
		// 			var email = currentRecord.val().email
		// 			var pesan = currentRecord.val().pesan
		// 			addItemToTable(idFeedback,nama, email, pesan);
		// 		})
		// 	});
		// }
		// var fedNo = 0;
		// //AddItemToTable()
		// function addItemToTable(idFed, nama, email, pesan){
			
		// 	var tbody = document.getElementById("data-table-feeds");
		// 	var trow = document.createElement("tr");
		// 	var td1 = document.createElement("td");
		// 	var td2 = document.createElement("td");
		// 	var td3 = document.createElement("td");
		// 	var td4 = document.createElement("td");
		// 	var td5 = document.createElement("td");

		// 	td1.innerHTML = ++fedNo;
		// 	td2.innerHTML = idFed;
		// 	td3.innerHTML = nama;
		// 	td4.innerHTML = email;
		// 	td5.innerHTML = pesan;

		// 	trow.appendChild(td1);
		// 	trow.appendChild(td2);
		// 	trow.appendChild(td3);
		// 	trow.appendChild(td4);
		// 	trow.appendChild(td5);

		// 	tbody.appendChild(trow)
		// }





		var no = 0;
		var dataFeeds = [];
		var dataFeedsSearch = [];
		var tampil = 5;
		var currentPage = 1;
		var allPage = 1;
		addData("");

		function addData(keyword) {
			var thead = document.getElementById("data-table-feed");
			thead.innerHTML = ""
			var trow = document.createElement("tr");
			var td1 = document.createElement("th");
			var td2 = document.createElement("th");
			var td3 = document.createElement("th");
			var td4 = document.createElement("th");
			var td5 = document.createElement("th");
			td1.innerHTML = "No";
			td2.innerHTML = "ID FeedBack";
			td3.innerHTML = "Nama";
			td4.innerHTML = "Email";
			td5.innerHTML = "Pesan";
			
			trow.appendChild(td1);
			trow.appendChild(td2);
			trow.appendChild(td3);
			trow.appendChild(td4);
			trow.appendChild(td5);

			thead.appendChild(trow)

			dataFeeds = []
			firebase.database().ref("feedback").once("value", function(allRecord){
				allRecord.forEach( function(currentRecord) {
					dataFeeds.push(currentRecord);
				})
			}).then(() => {
				var sum = generateData(keyword);
				addPagination(sum);
				tampilkan();
			});
		}

		function generateData(keyword) {
			dataFeedsSearch = [];
			for (ids = 0; ids < dataFeeds.length; ids++) {
				if ((dataFeeds[ids].val().email).toLowerCase().includes(keyword.toLowerCase())) {
					dataFeedsSearch.push(dataFeeds[ids]);
				}
			}
			return dataFeedsSearch.length;
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

			var dataTable = document.getElementById("data-table-feeds");
			dataTable.innerHTML = "";
			no = (startAt - 1) * tampil;
			startAt = (startAt - 1) * tampil
			var endAt = (startAt + tampil);
			if (endAt > dataFeedsSearch.length) {
				endAt = dataFeedsSearch.length
			}

			for (var i = startAt; i < endAt; i++) {
				addDataToTable(dataFeedsSearch[i])
			}
		}

		function addDataToTable(currentRecord) {
			var idFed= currentRecord.val().feebackId;
			var nama = currentRecord.val().nama;
			var email = currentRecord.val().email;
			var pesan = currentRecord.val().pesan;

			var tbody = document.getElementById("data-table-feeds");
			var trow = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var td4 = document.createElement("td");
			var td5 = document.createElement("td");

			td1.innerHTML = ++no;
			td2.innerHTML = idFed;
			td3.innerHTML = nama;
			td4.innerHTML = email;
			td5.innerHTML = pesan;

			trow.appendChild(td1);
			trow.appendChild(td2);
			trow.appendChild(td3);
			trow.appendChild(td4);
			trow.appendChild(td5);

			tbody.appendChild(trow)
		}

		function addPagination(sumData) {
			var sumPage = Math.ceil(sumData / tampil);
			allPage = sumPage;
			var pagination = document.getElementById("btn-pagination-list-feeds");
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


	</script>

</body>

</html>