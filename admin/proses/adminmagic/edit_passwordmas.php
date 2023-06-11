<?php 

require "../../../koneksi.php";

session_start();

$id=$_POST['nik'];
$password=$_POST['password'];
$old_password=$_POST['old_password'];
$password_confirmation=$_POST['password_confirmation'];

$query = mysqli_query($host,"SELECT * FROM masyarakat WHERE nik='$id' AND password='$old_password'");
$cek = mysqli_num_rows($query);

if (!$cek>=1) {
    ?>
    <script type="text/javascript">
        alert ('Password yang anda masukkan salah, silahkan coba kembali');
        window.location="../../masyarakat.php?url=editmasyarakat&id_mas=<?php echo $id?>"
    </script>
    <?php
}elseif ($password!=$password_confirmation){
    ?>
    <script type="text/javascript">
        alert ('Data gagal diubah');
        window.location="../../masyarakat.php?url=editmasyarakat&id_mas=<?php echo $id?>"
    </script>
    <?php
} else {
    $query = mysqli_query($host,"UPDATE masyarakat SET password='$password' WHERE nik='$id'");
    if ($query) {
        ?>
    <script type="text/javascript">
        alert ('Password berhasil diubah');
        window.location="../../masyarakat.php"
    </script>
    <?php
    }else {
        ?>
        <script type="text/javascript">
            alert ('Password gagal diubah, silahkan coba kembali');
            window.location="../../masyarakat.php?url=editmasyarakat&id_mas=<?php echo $id?>"
        </script>
        <?php
    }
}

?>