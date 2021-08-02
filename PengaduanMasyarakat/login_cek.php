<?php
    include 'koneksi.php';
    session_start();
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $query=mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password'");
    $count=mysqli_num_rows($query);
    $data=mysqli_fetch_array($query);

    if($count>0 && $data['level']=="admin")
    {
        $_SESSION['username']=$data['username'];
        $_SESSION['password']=$data['password'];
        $_SESSION['level']=$data['level'];
        echo"
        <script>
            alert('Login sebagai Administrator Berhasil');
            location.href='universal/index.php';
        </script>";
    }
	
    else if($count>0 && $data['level']=="petugas")
    {
        $_SESSION['username']=$data['username'];
        $_SESSION['password']=$data['password'];
        $_SESSION['level']=$data['level'];
        echo"
        <script>
            alert('Login sebagai Petugas Berhasil');
            location.href='universal/index.php';
        </script>";
    }
	
    else if($count==0)
    {
        $query=mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE username='$username' AND password='$password'");
        $count=mysqli_num_rows($query);
        $data=mysqli_fetch_array($query);

        if($count>0)
        {
            $_SESSION['username']=$data['username'];
            $_SESSION['password']=$data['password'];
            $_SESSION['status']=$data['status'];
            echo"
            <script>
                alert('Login Berhasil');
                location.href='masyarakat/';
            </script>";
        }
		
        else
        {
            echo"
            <script>
                alert('Login Gagal');
                location.href='index.php';
            </script>";
        }
    }
	
    else
    {
        echo"
        <script>
            alert('Login Gagal');
            location.href='index.php';
        </script>";
    }
?>