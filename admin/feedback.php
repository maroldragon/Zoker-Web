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

	<title>Kelola Member</title>

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
					<h1 class="h3 mb-3"> <strong>Data</strong> Member </h1>
					<div class="col-12">
						<div class="card-header">
							<div class="mb-0">
								<nav class="navbar ">
									<form method="get" action="kelola-member-verifikasi.php">
										<button class="btn btn-secondary" type="submit">
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
									<table class="table table-hover my-0">
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
										<div id="btn-pagination-list-user" class="btn-group mr-2" role="group" aria-label="First group">
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

	

	<script src="js/vendor.js"></script>

	<?php
	@include_once("sourceJS.html");
	?>
	<script src="js/app.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/custom-user.js"></script>
	<script>
		SelectAllData()
		function SelectAllData(){
			
			//create table row
			document.getElementById("data-table-feeds").style.textAlign = "left";
			document.getElementById("data-table-feed").style.textAlign = "left";
			var thead = document.getElementById("data-table-feed");
			var trow = document.createElement("tr");
			var td1 = document.createElement("th");
			var td2 = document.createElement("th");
			var td3 = document.createElement("th");
			var td4 = document.createElement("th");
			var td5 = document.createElement("th");
			td1.innerHTML = "No";
			td2.innerHTML = "ID User";
			td3.innerHTML = "ID Feedback";
			td4.innerHTML = "Gmail";
			td5.innerHTML = "Pesan";
			
			trow.appendChild(td1);
			trow.appendChild(td2);
			trow.appendChild(td3);
			trow.appendChild(td4);
			trow.appendChild(td5);

			thead.appendChild(trow)
			//end table row

			firebase.database().ref("feedback").once("value", function(allRecord){
				allRecord.forEach( function(currentRecord) {
					
					var idUser = currentRecord.val().idUser
					var idFeedback = currentRecord.val().idFeedback
					var gmail = currentRecord.val().gmail
					var pesan = currentRecord.val().pesan
					addItemToTable(idUser,idFeedback,gmail,pesan);
				})
			});
		}
		var usrNo = 0;
		//AddItemToTable()
		function addItemToTable(usrname, name, mail, loc){
			
			var tbody = document.getElementById("data-table-feeds");
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

			tbody.appendChild(trow)
		}
	</script>

</body>

</html>