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
			.error{
				margin-top: 6px;
				margin-bottom: 0;
				color: #fff;
				background-color: #D65C4F;
				display: table;
				padding: 5px 8px;
				font-size: 11px;
				font-weight: 600;
				line-height: 14px;
			  }
			.green{
				margin-top: 6px;
				margin-bottom: 0;
				color: #fff;
				background-color: green;
				display: table;
				padding: 5px 8px;
				font-size: 11px;
				font-weight: 600;
				line-height: 14px;
			  }
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
			<a class="navbar-brand" href="#"><span style="font-weight: bold;">PENGADUAN <span style="color: red;">MASYARAKAT</span></span></a>
			<?php
				session_start();
				include '../koneksi.php';
				if(!isset($_SESSION['status']))
				{
					echo"
                    <script>
                        alert('SESI KADALUARSA');
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
			<div class="row">
				<div class="col-sm-2">
					<nav class="navbar bg-light navbar-light">
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
							<li class="nav-item">
								<a class="nav-link" href="ganti_password.php">Ganti Password</a>
							</li>
						</ul>
					</nav>
				</div>
				
				<div class="col-sm-10">
					<div class="panel panel-danger">
						<div class="panel-heading" style="color: black;"> HALAMAN GANTI PASSWORD </div>
						<div class="panel-body"> 
							<form action="" method="POST">
								<div class="form-group">
									<label for="username">Password Lama:</label>
									<input type="text" class="form-control" name="password" id="username" style="width: 50%;" placeholder="Password Lama" required>
								</div>
								<div class="form-group">
									<label for="password">Password Baru:</label>
									<input type="password" class="form-control" name="password" id="password" style="width: 60%;" placeholder="Password Baru" required>
								</div>
								<div class="form-group">
									<label for="password">Konfirmasi Password:</label>
									<input type="text" class="form-control" name="password" id="telp" style="width: 30%;" placeholder="Konfirmasi Password" required>
								</div>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
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