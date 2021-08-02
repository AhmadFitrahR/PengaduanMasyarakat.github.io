<?php
    include '../koneksi.php';
    $nik=$_POST['nik'];
    $tgl_pengaduan=$_POST['tgl_pengaduan'];
    $nama=$_POST['nama'];
	$isi_laporan=$_POST['isi_laporan'];
	$foto=$_POST['foto'];
    
    $query=mysqli_query($koneksi,"INSERT INTO pengaduan VALUES('','$tgl_pengaduan','$nik','$nama','$isi_laporan','$foto','')");
    
    if($query===TRUE)
    {
        echo 
            "<script>
                alert('Pengaduan Anda Sukses')
                location.href='pengaduan.php';
            </script>";
    }
	
    else
    {
        echo 
            "<script>
                alert('Pengaduan Anda Gagal')
                location.href='pengaduan.php';
            </script>";
    }
?>