<?php 

require "../../koneksi.php";

session_start();

$nikk=$_SESSION['nik'];
$nik=$_POST['nik'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$no_telf=$_POST['no_telf'];
$username=$_POST['username'];

$query = mysqli_query($host,"UPDATE masyarakat SET nik='$nik', nama='$nama', email='$email', username='$username', telp='$no_telf' WHERE nik='$nikk'");

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