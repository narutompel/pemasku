<?php
require '../../koneksi.php';

session_start();

$id_petugas=$_SESSION['id_petugas'];
$tanggapan=$_POST['tanggapan'];
$id_pengaduan=$_POST['id_pengaduan'];
$tgl_tanggapan=date('Y/m/d');
$st='Selesai';

$sql = mysqli_query($host, "INSERT INTO tanggapan(id_pengaduan, tgl_tanggapan, tanggapan, id_petugas)  VALUES ('$id_pengaduan','$tgl_tanggapan','$tanggapan','$id_petugas')");

if ($sql) {
    $updatest=mysqli_query($host, "UPDATE pengaduan SET status='$st' WHERE id_pengaduan='$id_pengaduan'");
    if ($updatest) {
        ?>
        <script type="text/javascript">
            alert ('Tanggapan berhasil dikirim');
            window.location="../aduan.php"
        </script>
        <?php
    }
} else {
    ?>
    <script type="text/javascript">
        alert ('Gagal melakukan tanggapan, Silahkan coba lagi');
        window.location="../aduan.php?url=tanggapan&id=<?php echo $id_pengaduan?>"
    </script>
    <?php
}
?>