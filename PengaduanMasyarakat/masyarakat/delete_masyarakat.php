<?php
	include '../koneksi.php';
	$nik=$_GET['nik'];

	$query=mysqli_query($koneksi,"DELETE FROM masyarakat WHERE nik='$nik'");
	
	if($query===TRUE)
    {
        echo 
            "<script>
                alert('Delete Sukses')
                location.href='edit_akun.php';
            </script>";
    }
	
    else
    {
        echo 
            "<script>
                alert('Delete Gagal')
                location.href='edit_akun.php';
            </script>";
    }
?>