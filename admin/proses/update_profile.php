<?php 

require "../../koneksi.php";

session_start();

$id=$_SESSION['id_petugas'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$no_telf=$_POST['no_telf'];
$username=$_POST['username'];

$query = mysqli_query($host,"UPDATE petugas SET nama_user='$nama', email='$email', username='$username', telp='$no_telf' WHERE id_petugas='$id'");

if ($query) {
    ?>
    <script type="text/javascript">
        alert ('Data berhasil diubah, Silahkan login kembali');
        window.location="logout.php"
    </script>
    <?php
}else {
    ?>
    <script type="text/javascript">
        alert ('Data gagal diubah');
        window.location="../profile.php"
    </script>
    <?php
}

?>