<?php 
require "../../koneksi.php";

$verif=mysqli_query($host,"UPDATE pengaduan SET status='Proses' WHERE id_pengaduan='$_GET[id]'");

if ($verif) {
    ?>
    <script type="text/javascript">
        alert ('Aduan berhasil di vertifikasi');
        window.location="../aduan.php"
    </script>
    <?php
}

?>