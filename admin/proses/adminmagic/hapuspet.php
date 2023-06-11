<?php
require "../../../koneksi.php";

$id=$_GET['id'];

$delete= mysqli_query($host,"DELETE FROM petugas WHERE id_petugas='$id'");
if ($delete) {
    ?>
    <script type="text/javascript">
        alert ('Petugas berhasil di hapus');
        window.location="../../admin.php"
    </script>
    <?php
}
?>