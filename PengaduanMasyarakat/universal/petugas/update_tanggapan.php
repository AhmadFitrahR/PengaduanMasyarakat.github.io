<?php
    include '../../koneksi.php';
	$id_pengaduan=$_POST['id_pengaduan'];
	$tgl_tanggapan=$_POST['tgl_tanggapan'];
	$tanggapan=$_POST['tanggapan'];
	$id_petugas=$_POST['id_petugas'];
    
    $query=mysqli_query($koneksi,"INSERT INTO tanggapan VALUES('','$id_pengaduan','$tgl_tanggapan','$tanggapan','$id_petugas')");
	
    if($query===TRUE)
    {
        echo 
            "<script>
                alert('Tanggapan Sukses')
                location.href='tanggapan.php';
            </script>";
    }
	
    else
    {
        echo 
            "<script>
                alert('Tanggapan Gagal')
                
            </script>";
    }
?>