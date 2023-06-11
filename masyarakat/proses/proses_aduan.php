<?php
require '../../koneksi.php';

session_start();
$tgl=date('Y/m/d');
$nik=$_SESSION['nik'];
$isi=$_POST['isi_laporan'];
$ft=$_FILES['foto']['name'];
$file=$_FILES['foto']['tmp_name'];
$st=0;

$aduan = mysqli_query($host, "INSERT INTO pengaduan(tgl_pengaduan, nik, isi_laporan, foto, status) values('$tgl','$nik','$isi','$ft','$st')");
move_uploaded_file($file,"../../asset/img/aduan/".$ft);

if ($aduan) {
    ?>
    <script type="text/javascript">
        alert ('Pengaduan Berhasil, Terimakasih sudah memberikan aduan');
        window.location="../aduan-masyarakat.php"
    </script>
    <?php
}else {
    ?>
    <script type="text/javascript">
        alert ('Pengaduan Gagal, silahkan coba kembali');
        window.location="../tambahaduan.php"
    </script>
    <?php
}
?>
