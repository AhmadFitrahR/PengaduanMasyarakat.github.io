<?php
    include 'koneksi.php';
    $nik=$_POST['nik'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    
    $query=mysqli_query($koneksi,"INSERT INTO masyarakat VALUES('$nik','','$username','$password','','masyarakat')");
    
    if($query===TRUE)
    {
        echo 
            "<script>
                alert('Register Sukses')
                location.href='index.php';
            </script>";
    }
	
    else
    {
        echo 
            "<script>
                alert('Register Gagal')
                location.href='index.php';
            </script>";
    }
?>