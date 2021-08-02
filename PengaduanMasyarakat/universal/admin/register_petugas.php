<?php
    include '../../koneksi.php';
    $nama_petugas=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
	$telp=$_POST['telp'];
    
    $query=mysqli_query($koneksi,"INSERT INTO petugas VALUES('','$nama_petugas','$username','$password','$telp','petugas')");
    
    if($query===TRUE)
    {
        echo 
            "<script>
                alert('Register Sukses')
                location.href='data_petugas.php';
            </script>";
    }
	
    else
    {
        echo 
            "<script>
                alert('Register Gagal')
                location.href='data_petugas.php';
            </script>";
    }
?>