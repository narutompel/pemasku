<?php
session_start();
if (isset($_SESSION['level'])=="Masyarakat") {
  header("location: ../masyarakat/dashboard-masyarakat.php"); 
}elseif(isset($_SESSION['level'])=="Admin") {
  header("location: ../admin/dashboard.php");
}elseif(isset($_SESSION['level'])=="Petugas") {
  header("location: ../admin/dashboard.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../asset/style.css">

    <title>Pemas2023</title>
  </head>
  <body class="bgbl">
    <header>
      <div class="container logo">
        <nav>
          <a href="../index.php"><img src="../asset/img/logo.jpg" alt=""></a> 
        </nav>
      </div>
    </header>
