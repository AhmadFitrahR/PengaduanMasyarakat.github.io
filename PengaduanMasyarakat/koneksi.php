<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'pengaduan_masyarakat';
	
	$koneksi = mysqli_connect($host, $user, $pass, $dbname) or die (mysqli_error());

	if(!$koneksi)
	{
		die("Koneksi Gagal !:" .mysqli_connect_error());
	}
	//mysqli_close($conn);
?>