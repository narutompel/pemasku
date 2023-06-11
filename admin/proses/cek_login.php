<?php
require '../../koneksi.php';

$username=$_POST['username'];
$pass=$_POST['password'];
$sql= mysqli_query($host,"SELECT * FROM petugas WHERE username='$username' and password='$pass'");
$cek=mysqli_num_rows($sql);

if ($cek>0) {
    $data=mysqli_fetch_array($sql);
    session_start();
    $_SESSION['id_petugas']=$data['id_petugas'];
    $_SESSION['nama']=$data['nama_user'];
    $_SESSION['username']=$username;
    $_SESSION['email']=$data['email'];
    $_SESSION['telp']=$data['telp'];
    $_SESSION['level']=$data['level'];

    header('location:../dashboard.php');
}else {
    header('location:../loginadmin.php?nama=kosong');
}