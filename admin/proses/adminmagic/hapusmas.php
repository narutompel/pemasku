<?php
require "../../../koneksi.php";

$id=$_GET['id'];

$delete= mysqli_query($host,"DELETE FROM masyarakat WHERE nik='$id'");
if ($delete) {
    ?>
    <script type="text/javascript">
        alert ('Masyarakat berhasil di hapus');
        window.location="../../masyarakat.php"
    </script>
    <?php
}
?>