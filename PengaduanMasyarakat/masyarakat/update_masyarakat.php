<?php
    include '../koneksi.php';
    $nik=$_POST['nik'];
	$nama=$_POST['nama'];
	$telp=$_POST['telp'];
    $username=$_POST['username'];
	
	$query=mysqli_query($koneksi,"UPDATE masyarakat SET nama='$nama',telp='$telp',username='$username' WHERE nik='$nik'");
	
	if($query===TRUE)
    {
        echo 
            "<script>
                alert('Update Sukses')
                location.href='edit_akun.php';
            </script>";
    }
	
    else
    {
        echo 
            "<script>
                alert('Update Gagal')
                location.href='edit_akun.php';
            </script>";
    }
?>