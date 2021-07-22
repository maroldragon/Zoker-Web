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

	<title>Admin Perpustakaan Digital</title>

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

					<h1 class="h3 mb-3"><strong>Data</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Member Terdaftar</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                              </svg>
														</div>
													</div>
												</div>
												<h1 id="jumlahMember" class="mt-1 mb-3">0</h1>
												<!-- <div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
													<span class="text-muted">Sejak minggu lalu</span>
												</div> -->
											</div>
										</div>																				
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Member Baru</h5>
													</div>
													<div class="col-auto">
														<div class="stat text-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                                              </svg>
														</div>
													</div>
												</div>
												<h1  id="jumlahMemberBaru" class="mt-1 mb-3">0</h1>
												<!-- <div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Sejak minggu lalu</span>
												</div> -->
											</div>
										</div>
									</div>
									<div class="col-md-11">										
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Jumlah item Buku</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
																<path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
															</svg>
															<!--<i class="align-middle" data-feather="shopping-cart"></i>-->
														</div>
													</div>
												</div>
												<h1 id="jumlahBuku" class="mt-1 mb-3">0</h1>
												<!-- <div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
													<span class="text-muted">Sejak minggu lalu</span>
												</div> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Statistik Member dan Buku</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
												<canvas id="uploadBuku" style="display: block; width: 453px; height: 200px;" class="chartjs-render-monitor" width="453" height="200"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Member Terdaftar</td>
													<td id="totalMember" class="text-right">0</td>													
												</tr>
												<tr>
													<td>Member Baru</td>
													<td id="totalMemberBaru" class="text-right">0</td>
												</tr>
												<tr>
													<td>Jumlah item Buku</td>
													<td id="totalBook" class="text-right">0</td>
												</tr>
											</tbody>
										</table>
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

	<script src="js/vendor.js"></script>
	<script src="js/app.js"></script>

	<script>
		$(function() {
			var ctx = document.getElementById('chartjs-dashboard-line').getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, 'rgba(215, 227, 244, 1)');
			gradient.addColorStop(1, 'rgba(215, 227, 244, 0)');
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: 'line',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	
	<script>
		$(function() {
			var sumUserVer = 0;
			var sumUserNon = 0;
			var sumBook = 0;
			// Pie chart document.getElementById("uploadBuku")
			firebase.database().ref("user").once('value', function(allRecord){
				allRecord.forEach( function(child) { 
					if(child.val().status == "verified"){
						sumUserVer += 1;
					}else{
						sumUserNon += 1;
					}
				})
			}).then(()=> {
				getTotalBook()
			})

			function getTotalBook(){
				firebase.database().ref("books").once('value', function(allRecord){
				allRecord.forEach( function(child) { 
					sumBook += 1;
				})
				}).then(()=> {
					//function generateChart() {}
					new Chart(document.getElementById("uploadBuku"), {
						type: 'pie',
						data: {
							labels: ["Member Terdaftar", "Member Baru", "Jumlah item Buku"],
							datasets: [{
								data: [sumUserVer, sumUserNon, sumBook],
								backgroundColor: [
									window.theme.primary,
									window.theme.warning,
									window.theme.danger
								],
								borderWidth: 5
							}]
						},
						options: {
							responsive: !window.MSInputMethodContext,
							maintainAspectRatio: false,
							legend: {
								display: false
							},
							cutoutPercentage: 75
						}
					});
				})
			}
			
	

		});
	</script>

	<?php
		@include_once("sourceJS.html");
	?>
	<script src="js/custom.js"></script>
	<script> 
		const dbBook = firebase.database().ref("books");
		getBookTotal()
		function getBookTotal(){
			var total = 0;
			dbBook.once('value', function(allRecord){
				allRecord.forEach( function() {
					total += 1;
				})
			}).then(() => {
				$("#jumlahBuku").html(total);
				$("#totalBook").html(total);
			});
		}
	</script>
	<script> 
		const dbMember = firebase.database().ref("user");
		getMemberTotal()
		function getMemberTotal(){
			var total = 0;
			var totalNew = 0;
			dbMember.once('value', function(allRecord){
				allRecord.forEach( function(child) {
					if(child.val().status == "verified") {
						total += 1;
					}else {
						totalNew += 1;
					}
				})
			}).then(() => {
				$("#jumlahMember").html(total);
				$("#totalMember").html(total);
				$("#jumlahMemberBaru").html(totalNew);
				$("#totalMemberBaru").html(totalNew);
			});
		}
	</script>
</body>

</html>