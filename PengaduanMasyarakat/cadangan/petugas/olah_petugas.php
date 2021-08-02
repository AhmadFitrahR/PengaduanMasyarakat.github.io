<html>
	<head>
		<title>Pengaduan Masyarakat</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../img/favicon.png" rel="icon">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<script src="../js/jquery.min.js"></script>
		<script src="../js/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<!-- Library -->
		<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
		<script src="../lib/js/jquery.min.js"></script>
		<script src="../lib/js/bootstrap.min.js"></script>
		<!-- End Library -->
		<style type="text/css">
			/* Make the image fully responsive */
			.carousel-inner img {
				width: 100%;
				height: 100%;
			}
			
			.panel-heading{
				background: red;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
			<a class="navbar-brand" href="#"><span style="font-weight: bold;">PENGADUAN <span style="color: red;">MASYARAKAT</span></span></a>
			<?php
				session_start();
				include '../koneksi.php';
				if(!isset($_SESSION['level']))
				{
					echo"
                    <script>
                        alert('Anda Dilarang Masuk. Silahkan Login Terlebih Dahulu');
                        location.href='../index.php';
                    </script>";
				}
				else
				{
					$username=$_SESSION['username'];
					$password=$_SESSION['password'];
					$level=$_SESSION['level'];
					$sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
					$query = mysqli_query($koneksi,$sql);
					$count = mysqli_num_rows($query);
					$data = mysqli_fetch_array($query);
					
					if($level=="admin")
					{
						echo
						'
						<ul class="navbar-nav mr-auto">
						
						</ul>
						<button type="button" class="btn btn-light" data-toggle="modal" data-target="#Profile">
							Akun
						</button>
						';
					}
					else if($level=="petugas")
					{
						echo
						'
						<ul class="navbar-nav mr-auto">
				
						</ul>
						<button type="button" class="btn btn-light" data-toggle="modal" data-target="#Profile">
							Akun
						</button>
						';
					}
					else
					{
						echo
						'
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="#">Laporan Pengaduan</a>
							</li>
						</ul>
						<button type="button" class="btn btn-light" data-toggle="modal" data-target="#Profile">
							Akun
						</button>
						';
					}
				}
			?>
		</nav>
		<!-- SIDEBAR -->
		<div class="container-fluid">
			<?php
				include '../koneksi.php';
				if(!isset($_SESSION['level']))
				{
					echo"
                    <script>
                        alert('Anda Dilarang Masuk. Silahkan Login Terlebih Dahulu');
                        location.href='../index.php';
                    </script>";
				}
				else
				{
					$username=$_SESSION['username'];
					$password=$_SESSION['password'];
					$level=$_SESSION['level'];
					$sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
					$query = mysqli_query($koneksi,$sql);
					$count = mysqli_num_rows($query);
					$data = mysqli_fetch_array($query);
					
					if($level=="admin")
					{
						echo
						'
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-2">
									<nav class="navbar bg-light navbar-light">
										<ul class="navbar-nav">
											<li class="nav-item">
												<a class="nav-link" href="index.php">Beranda</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#">Verifikasi Pengaduan</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#">Beri Tanggapan</a>
											</li>
											<li class="nav-item">
												<a class="nav-link dropdown-toggle" data-toggle="collapse" data-target="#demo">Petugas</a>
												<div id="demo" class="collapse">
													<ul class="navbar-nav">
														<li class="nav-item">
															<a class="nav-link navbar-light" href="data_petugas.php">Tambah Petugas</a>
															<a class="nav-link navbar-light" href="olah_petugas.php">Olah Petugas</a>
														</li>
													</ul>
												</div>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="generate_laporan.php">Generate Laporan</a>
											</li>
										</ul>
									</nav>
								</div>
								';
							?>
							<?php
								include '../koneksi.php';
								$querya="SELECT * FROM petugas WHERE level='petugas'";
								$resulta=mysqli_query($koneksi,$querya);
								$counta=mysqli_num_rows($resulta);
							?>
								<div class="col-sm-10">
									<div class="panel panel-danger">
										<div class="panel-heading" style="color: black;"> HALAMAN OLAH PETUGAS </div>
										<div class="panel-body"> 
										
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>No.</th>
														<th>ID Petugas</th>
														<th>Nama Petugas</th>
														<th>No Telepon</th>
														<th>Username</th>
														<th>Level</th>
														<th>Opsi</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$no=1;
														while($dataa=mysqli_fetch_array($resulta))
														{
													?>
													<tr>
														<td><?php echo $no; ?></td>
														<td><?php echo $dataa['id_petugas']; ?></td>
														<td><?php echo $dataa['nama_petugas']; ?></td>
														<td><?php echo $dataa['telp']; ?></td>
														<td><?php echo $dataa['username']; ?></td>
														<td><?php echo $dataa['level']; ?></td>
														<td>
															<a class="badge badge-success" href="edit_olah_petugas.php?id_petugas=<?php echo $dataa['id_petugas']; ?>">Edit</a>
															<a class="badge badge-danger" href="delete_petugas.php?id_petugas=<?php echo $dataa['id_petugas']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus Data ini?')">Hapus</a>
														</td>
													</tr>
													<?php
														$no++;
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					<?php
					}
					else if($level=="petugas")
					{
						echo
						'
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-2">
									<nav class="navbar bg-light navbar-light">
										<ul class="navbar-nav">
											<li class="nav-item">
												<a class="nav-link" href="index.php">Beranda</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#">Verifikasi Pengaduan</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#">Beri Tanggapan</a>
											</li>
										</ul>
									</nav>
								</div>
								<div class="col-sm-10">
									<div class="panel panel-danger">
										<div class="panel-heading" style="color: black;"> HALAMAN UTAMA </div>
										<div class="panel-body"> 
											<center><h2>Halaman Petugas</h2><center>
										</div>
									</div>
								</div>
							</div>
						</div>
						';
					}
					else
					{
						echo
						'
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="#">Laporan Pengaduan</a>
							</li>
						</ul>
						<button type="button" class="btn btn-light" data-toggle="modal" data-target="#Profile">
							Akun
						</button>
						';
					}
				}
			?>
		</div>
		
		<center>		
			<div class="alert alert-light">
				<strong>Copyright @</strong> Ahmad Fitrah Ramdhani 2019-2020
			</div>
		</center>
		
		<!-- The Modal -->
		<div class="modal fade" id="Profile">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Akun Anda</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<!-- Modal body -->
					<div class="modal-body">
						<center>
							<strong><?php echo $username; ?></strong>
							<br>
                            <?php 
                                if($level=="admin")
                                {
                                    echo "Administrator";
                                }
                                else if($level=="petugas")
                                {
                                    echo "Petugas";
                                }
                                else
                                {
                                    echo "User";
                                }
                            ?>
						</center>
							<hr>
							<h4><strong>Data Umum</strong></h4>
							<?php
								echo "Nama Lengkap : ";
								echo $data['nama_petugas']
							?>
							<?php
								echo "<br>No Telepon : ";
								echo $data['telp']
							?>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<a href="../logout.php">
							<button type="button" class="btn btn-danger">
								Keluar
							</button>
						</a>
					</div>
        
				</div>
			</div>
		</div>
		<!-- End The Modal -->
		
	</body>
</html>