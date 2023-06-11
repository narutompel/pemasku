<?php
session_start();
if ($_SESSION['level'] == "") {
  header("location: ../masyarakat/login-masyarakat.php?login=kosong"); 
}elseif ($_SESSION['level'] == "Admin") {
  header("location: ../admin/dashboard.php"); 
}elseif ($_SESSION['level'] == "Petugas") {
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
    <!-- <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../asset/style.css">
    <link rel="stylesheet" href="../asset/fa/css/all.css">

    <title>Masyarakat - <?php echo "$menu" ?></title>
  </head>
  <body class="dashboard-masyarakat">
    <header>
      <div class="container2 logodash">
        <nav>
          <a class="" href="dashboard-masyarakat.php">Pemas2023</a>
          <div class="navigasi">
            <ul>
              <li class="mr-2 nav-link">
                  <a class="" href="profile.php"><h1><?php echo $_SESSION['nama']?><br> <span>Masyarakat</span></h1></a> 
              </li>
              <li>
                <div class="garis">
                  <a href=""></a>
                </div>
              </li>
              <li class="nav-link">
                <a href="proses/logout.php">
                  <i class="fa-3x fas fa-sign-out-alt ml-3 mt-3"></i>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <section>
      <div class="container2">
        <div class="row mt-5">
          <div class="col-2">
            <div class="sidebar">
              <div class="sidebar-menu">
                <ul>
                  <li class="">
                    <a href="dashboard-masyarakat.php">
                      <span class="btn btnmenu <?php if($menu=="Dashboard") echo 'active';?>">Dashboard</span>
                    </a>
                  </li>
                  <li>
                    <a href="aduan-masyarakat.php">
                      <span class="btn btnmenu <?php if($menu=="Aduan") echo ('active');?>">Aduan</span>
                    </a>
                  </li>
                  <li>
                    <a href="tanggapan-masyarakat.php">
                      <span class="btn btnmenu <?php if($menu=="Tanggapan") echo 'active';?>">Tanggapan</span>
                    </a>
                  </li>
                  <!-- <li>
                    <a href="selesai-masyarakat.php">
                      <span class="btn btnmenu <?php if($menu=="Selesai") echo ('active');?>">Selesai</span>
                    </a>
                  </li> -->
                  <!-- <li>
                    <a href="ditolak-masyarakat.php">
                      <span class="btn btnmenu <?php if($menu=="Ditolak") echo ('active');?>">Ditolak</span>
                    </a>
                  </li> -->
                  <li>
                    <a href="profile.php">
                      <span class="btn btnmenu <?php if ($menu=="Profile") echo 'active';?>">Profile</span>
                    </a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>