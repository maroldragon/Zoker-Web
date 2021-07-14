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
					<h1 class="h3 mb-3"> <strong>Data</strong> Member </h1>
					<div class="col-12">							
						<div class="card-header">
							<div class="mb-0">
								<nav class="navbar ">									
									<form method="get" action="kelola-member-verifikasi.php">
										<button class="btn btn-warning" type="submit">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
												<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
												<path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
											  </svg>
											<span> Verifikasi Member Baru</span>
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
						<!--table-->
						<div class="col-12">
							<div class="card flex-fill">
								<div class="card-header">
									<table class="table table-hover my-0">
										<thead>
											<tr >
												<th>No</th>													
												<th>Username</th>
												<th>Nama</th>
												<th>Email</th>
												<th>No Telfon</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>marold</td>
												<td>Martua Sinaga</td>
												<td>marolddragon@gmail.com</td>
												<td>085161449945</td>
												<td class="table-action">
													<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                                                        <form method="get" action="kelola-member-verifikasi.html">
                                                            <button class="btn btn-success" type="submit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                                                                  </svg>
                                                                <span>Verified</span>
                                                            </button>
                                                        </form>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
                                                        <div class="dropdown-menu-header">
                                                            <div class="position-relative">
                                                                Aksi
                                                            </div>
                                                        </div>
                                                        <div class="list-group">
                                                            <a href="#" class="list-group-item">
                                                                <div class="navbar">                                                                    
                                                                    <form action="form-group col-md-5">
                                                                        <span>Hapus Verifikasi</span>
                                                                    </form>
                                                                    <form action="form-group col-md-5">
                                                                        <button class="btn btn-danger" type="submit">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                              </svg>
                                                                            <span>Hapus</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </a>                                                            
                                                        </div>
                                                    </div>
												</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>owen</td>
												<td>Evan Owen Pasaribu</td>
												<td>evanowenpasaribu@gmail.com</td>
												<td>082161848845</td>
												<td class="table-action">
                                                    <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                                                        <form method="get" action="kelola-member-verifikasi.html">
                                                            <button class="btn btn-success" type="submit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                                                                  </svg>
                                                                <span>Verified</span>
                                                            </button>
                                                        </form>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
                                                        <div class="dropdown-menu-header">
                                                            <div class="position-relative">
                                                                Aksi
                                                            </div>
                                                        </div>
                                                        <div class="list-group">
                                                            <a href="#" class="list-group-item">
                                                                <div class="navbar">                                                                    
                                                                    <form action="form-group col-md-5">
                                                                        <span>Hapus Verifikasi</span>
                                                                    </form>
                                                                    <form action="form-group col-md-5">
                                                                        <button class="btn btn-danger" type="submit">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                              </svg>
                                                                            <span>Hapus</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </a>                                                            
                                                        </div>
                                                    </div>
												</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td>fajar</td>
												<td>Iman Fajar Lombu</td>
												<td>fajarlombu@gmail.com</td>
												<td>081261436645</td>
												<td class="table-action">
													<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                                                        <form method="get" action="kelola-member-verifikasi.html">
                                                            <button class="btn btn-success" type="submit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                                                                  </svg>
                                                                <span>Verified</span>
                                                            </button>
                                                        </form>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
                                                        <div class="dropdown-menu-header">
                                                            <div class="position-relative">
                                                                Aksi
                                                            </div>
                                                        </div>
                                                        <div class="list-group">
                                                            <a href="#" class="list-group-item">
                                                                <div class="navbar">                                                                    
                                                                    <form action="form-group col-md-5">
                                                                        <span>Hapus Verifikasi</span>
                                                                    </form>
                                                                    <form action="form-group col-md-5">
                                                                        <button class="btn btn-danger" type="submit">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                              </svg>
                                                                            <span>Hapus</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </a>                                                            
                                                        </div>
                                                    </div>
												</td>
											</tr>
											<tr>
												<th scope="row">4</th>
												<td>Jancok</td>
												<td>Jancokkkkk Sihombing</td>
												<td>Jancokkkkk@gmail.com</td>
												<td>085287615621</td>
												<td class="table-action">
													<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                                                        <form method="get" action="kelola-member-verifikasi.html">
                                                            <button class="btn btn-success" type="submit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                                                                  </svg>
                                                                <span>Verified</span>
                                                            </button>
                                                        </form>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
                                                        <div class="dropdown-menu-header">
                                                            <div class="position-relative">
                                                                Aksi
                                                            </div>
                                                        </div>
                                                        <div class="list-group">
                                                            <a href="#" class="list-group-item">
                                                                <div class="navbar">                                                                    
                                                                    <form action="form-group col-md-5">
                                                                        <span>Hapus Verifikasi</span>
                                                                    </form>
                                                                    <form action="form-group col-md-5">
                                                                        <button class="btn btn-danger" type="submit">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                              </svg>
                                                                            <span>Hapus</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </a>                                                            
                                                        </div>
                                                    </div>
												</td>
											</tr>											
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
</body>

</html>