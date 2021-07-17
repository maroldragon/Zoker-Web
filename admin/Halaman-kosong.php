<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Blank Page | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<div class="main">
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Blank Page</h1>

					<div class="col-12">
							<div class="card flex-fill">
								<div class="card-header">
									<table class="table table-hover my-0">
										<thead>
												<th>No</th>													
												<th>Username</th>
												<th>Nama</th>
												<th>Email</th>
												<th>Alamat</th>
												<th>Status</th>											
										</thead>
										<tbody id="data-table-user">
											
										</tbody>
									</table>
								</div>	
							</div>
						</div>
				</div>
			</main>			
		</div>
	</div>
	<script src="js/vendor.js"></script>

	<?php
		@include_once("sourceJS.html");
	?>
	<script src="js/app.js"></script>
	<script src="js/custom.js"></script>
	<script>
		SelectAllData()
		function SelectAllData(){
			firebase.database().ref("user").once("value", function(allRecord){
				allRecord.forEach( function(currentRecord) {
					var usrname = currentRecord.val().userName;
					var name = currentRecord.val().namaDepan;
					var mail = currentRecord.val().email;
					var loc = currentRecord.val().alamat;
					addItemToTable(usrname, name, mail, loc);
				})
			});
		}
		

		var usrNo = 0;
		//AddItemToTable()
		function addItemToTable(usrname, name, mail, loc){
			var tbody = document.getElementById("data-table-user");
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