<html>
	<head>
		<title>
			Pengaduan Masyarakat
		</title>
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
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
			<a class="navbar-brand" href="#"><span style="font-weight: bold;">PENGADUAN <span style="color: red;">MASYARAKAT</span></span></a>
			<?php
				session_start();
				include '../koneksi.php';
				if(!isset($_SESSION['status']))
				{
					echo"
                    <script>
                        alert('Anda Tidak Bisa Masuk. Harus Login Terlebih Dahulu');
                        location.href='../index.php';
                    </script>";
				}
				else
				{
					$username=$_SESSION['username'];
					$password=$_SESSION['password'];
					$status=$_SESSION['status'];
					$sql = "SELECT * FROM masyarakat WHERE username='$username' AND password='$password'";
					$query = mysqli_query($koneksi,$sql);
					$count = mysqli_num_rows($query);
					$data = mysqli_fetch_array($query);
					
					if($status=="masyarakat")
					{
						echo
						'
						<ul class="navbar-nav mr-auto">
						</ul>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Profile">
							Akun
						</button>
						';
					}
				}
			?>
		</nav>
		<!-- SIDEBAR -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2">
					<nav class="navbar bg-dark navbar-dark sticky-top">
						<ul class="navbar-nav">
						<li class="nav-item">
								<a class="nav-link" href="index.php">Beranda</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="pengaduan.php">Pengaduan Anda</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="edit_akun.php">Edit Akun</a>
							</li>
						</ul>
					</nav>
				</div>
				<?php
					include '../koneksi.php';
					$querya="SELECT * FROM pengaduan ";
					$resulta=mysqli_query($koneksi,$querya);
					$counta=mysqli_num_rows($resulta);
					$dataa=mysqli_fetch_array($resulta);
				?>
				<div class="col-sm-10">
					<div class="alert alert-dark">
					<h4>HALAMAN PENGADUAN</h4>
					<hr>
						<div class="row">
							<div class="col-md-6">
								<form action="pengaduan_simpan.php" method="POST">
									<div class="form-group">
										<label for="tgl_pengaduan">Tanggal Pengaduan:</label>
										<input type="text" class="form-control" name="tgl_pengaduan" value="<?php echo date('Y-d-m'); ?>" id="tgl_pengaduan" style="width: 40%;" required>
									</div>
									<div class="form-group">
										<label for="nik">NIK:</label>
										<input type="text" class="form-control" name="nik" id="nik" value="<?php echo $data['nik']; ?>" style="width: 40%;" placeholder="NIK" required readonly>
									</div>
									<div class="form-group">
										<label for="nama">Nama:</label>
										<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['nama']; ?>" style="width: 60%;" placeholder="Nama" required>
									</div>
									<div class="form-group">
										<label for="isi_laporan">Laporan Anda:</label>
										<textarea type="text" class="form-control" name="isi_laporan" id="isi_laporan" style="width: 60%;" placeholder="Isi Laporan" required></textarea>
									</div>
									<div class="form-group">
										<label for="foto">Foto:</label>
										<input type="file" class="form-control" name="foto" id="foto" style="width: 60%; height: 50%;" placeholder="Password" required>
									</div>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</form>
							</div>
							<div class="col-md-6">
								<div class="wrap">
									<?php
										$nama=$data['nama'];
										$sqla=mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE nama='$nama'");
										
										while($dataa=mysqli_fetch_array($sqla))
										{
									?>
									<a href="" class="blog-img"></a>
										<div class="desc">
											<span>Pelapor <?php echo $dataa['nama']; ?> | <?php echo $dataa['tgl_pengaduan']; ?> | Laporan <?php echo $dataa['status']; ?> </span>
											<br>
											<h2><?php echo $dataa['isi_laporan']; ?></h2>
												<?php 
													$id_pengaduan=$dataa['id_pengaduan'];
													$sqlb=mysqli_query($koneksi,"SELECT * FROM tanggapan WHERE id_pengaduan='$id_pengaduan'");
													
													while($datab=mysqli_fetch_array($sqlb))
													{
														?>
															Tanggapan : <p>
															<span>&mdash; <?php echo $datab['tgl_tanggapan']; ?> </span>
															<h2><?php echo $datab['tanggapan']; ?></h2>
															<hr>
														<?php
													}
												?>
										</div>
									<?php 
										}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<center>		
			<div class="alert alert-dark">
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
                                if($status=="masyarakat")
                                {
                                    echo "Masyarakat";
                                }

                            ?>
						</center>
						<hr>
						<h4><strong>Data Umum</strong></h4>
						<?php
							echo "Nama Lengkap : ";
							echo $data['nama']
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
		
	</body>
</html>