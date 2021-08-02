<?php
    include '../koneksi.php';
    $nik=$_POST['nik'];
    $nama=$_POST['nama'];
	$username=$_POST['username'];
	$telp=$_POST['telp'];
    
   	$query=mysqli_query($koneksi,"UPDATE masyarakat SET nama='$nama',username='$username',telp='$telp' WHERE nik='$nik'");
    
    if($query===TRUE)
    {
        echo 
            "<script>
                alert('Edit Sukses')
                location.href='edit_akun.php';
            </script>";
    }
	
    else
    {
        echo 
            "<script>
                alert('Edit Gagal')
                location.href='edit_akun.php';
            </script>";
    }
?>