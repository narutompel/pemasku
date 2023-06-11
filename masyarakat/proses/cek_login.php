<?php
require '../../koneksi.php';

$username=$_POST['username'];
$pass=$_POST['password'];
$sql= mysqli_query($host,"SELECT * FROM masyarakat WHERE username='$username' and password='$pass'");
$cek=mysqli_num_rows($sql);

if ($cek>0) {
    $data=mysqli_fetch_array($sql);
    session_start();
    $_SESSION['nik']=$data['nik'];
    $_SESSION['nama']=$data['nama'];
    $_SESSION['username']=$username;
    $_SESSION['email']=$data['email'];;
    $_SESSION['telp']=$data['telp'];;
    $_SESSION['level']="masyarakat";

    header('location:../dashboard-masyarakat.php');
}else {
    header('location:../login-masyarakat.php?nama=kosong');
}