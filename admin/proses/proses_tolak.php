<?php 
require "../../koneksi.php";

$verif=mysqli_query($host,"UPDATE pengaduan SET status='Tolak' WHERE id_pengaduan='$_GET[id]'");

if ($verif) {
    ?>
    <script type="text/javascript">
        alert ('Aduan berhasil di Tolak');
        window.location="../aduan.php"
    </script>
    <?php
}

?>