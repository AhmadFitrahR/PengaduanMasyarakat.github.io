<?php
    include '../../koneksi.php';
    $id_petugas=$_POST['id_petugas'];
	$nama_petugas=$_POST['nama_petugas'];
	$telp=$_POST['telp'];
    $username=$_POST['username'];
    $level=$_POST['level'];
	
	$query=mysqli_query($koneksi,"UPDATE petugas SET nama_petugas='$nama_petugas',telp='$telp',username='$username',level='$level' WHERE id_petugas='$id_petugas'");
	
	if($query===TRUE)
    {
        echo 
            "<script>
                alert('Update Sukses')
                location.href='olah_petugas.php';
            </script>";
    }
	
    else
    {
        echo 
            "<script>
                alert('Update Gagal')
                location.href='olah_petugas.php';
            </script>";
    }
?>