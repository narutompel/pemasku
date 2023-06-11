<?php
session_start();
if ($_SESSION['level'] == "") {
  header("location: ../loginadmin.php?login=kosong"); 
}elseif ($_SESSION['level'] == "masyarakat") {
  header("location: ../../masyarakat/dashboard-masyarakat.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../../asset/style.css">
    <title>Cetak Laporan</title>
</head>
<body>

<h2 class="text-center mt-4">Pengaduan Masyarakat<br>Laporan Tanggapan</h2>    
<h4 class="text-center mt-3"><?php echo date('d/m/Y', strtotime($_GET['dari']))?> - <?php echo date('d/m/Y', strtotime($_GET['sampai']))?></h4>   
    <table class="table mt-5">
        <thead class="text-center">
        <tr>
            <th>ID</th>
            <th>Pengadu</th>
            <th>Tanggal</th>
            <th>Aduan</th>
            <th>Tanggapan</th>
            <th>Tanggal</th>
            <th>Petugas</th>
        </tr>
        </thead>
        <?php 
            require "../../koneksi.php";
            $dari=$_GET['dari'];
            $sampai=$_GET['sampai'];
            $sql=mysqli_query($host,"SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE tgl_tanggapan BETWEEN '$dari' and '$sampai'");
            $cek=mysqli_num_rows($sql);

            if ($cek>0) {
            while ($dataaduan=mysqli_fetch_array($sql)) {
                # code...
                ?>
                <tr>
                <td class="text-center"><?php echo $dataaduan['id_pengaduan']?></td>
                <td ><?php echo $dataaduan['nama']?></td>
                <td class="text-center"><?php echo date('d-m-Y', strtotime( $dataaduan['tgl_pengaduan'])) ?></td>
                <td><?php echo $dataaduan['isi_laporan']?></td>
                <td><?php echo $dataaduan['tanggapan']?></td>
                <td class="text-center"><?php echo date('d-m-Y', strtotime( $dataaduan['tgl_tanggapan'])) ?></td>
                <td ><?php echo $dataaduan['nama_user']?></td>
                </tr> 
                <?php
            }
            }else {
            ?>
            <h1 class ="my-1 text-center">Tidak ada tanggapan pada tanggal tersebut!</h1>
            <?php
            }
            ?>
    </table>
    
    <br>
    <div class="text-cetak">
        <h2>Badung, <?php echo date('d-m-Y')?></h2>
        <h3><?php echo $_SESSION['level']?>,</h3>
        <h3 class="mtt"><?php echo $_SESSION['nama']?></h3>
    </div>
<script type="text/javascript">
    window.print();
</script>
</body>
</html>