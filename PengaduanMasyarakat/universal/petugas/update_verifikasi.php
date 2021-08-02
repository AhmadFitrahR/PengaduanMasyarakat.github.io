<?php
    include '../../koneksi.php';
	$id_pengaduan=$_POST['id_pengaduan'];
	$status=$_POST['status'];
    
    $query=mysqli_query($koneksi,"UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'");
	
    if($query===TRUE)
    {
        echo 
            "<script>
                alert('Verifikasi Sukses')
                location.href='verifikasi.php';
            </script>";
    }
	
    else
    {
        echo 
            "<script>
                alert('Verifikasi Gagal')
                location.href='verifikasi.php';
            </script>";
    }
?>