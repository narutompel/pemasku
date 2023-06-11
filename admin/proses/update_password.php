<?php 

require "../../koneksi.php";

session_start();

$id=$_SESSION['id_petugas'];
$password=$_POST['password'];
$old_password=$_POST['old_password'];
$password_confirmation=$_POST['password_confirmation'];

$query = mysqli_query($host,"SELECT * FROM petugas WHERE id_petugas='$id' AND password='$old_password'");
$cek = mysqli_num_rows($query);

if (!$cek>=1) {
    ?>
    <script type="text/javascript">
        alert ('Password yang anda masukkan salah, silahkan coba kembali');
        window.location="../profile.php"
    </script>
    <?php
}elseif ($password!=$password_confirmation){
    ?>
    <script type="text/javascript">
        alert ('Data gagal diubah');
        window.location="../profile.php"
    </script>
    <?php
} else {
    $query = mysqli_query($host,"UPDATE petugas SET password='$password' WHERE id_petugas='$id'");
    if ($query) {
        ?>
    <script type="text/javascript">
        alert ('Password berhasil diubah, Silahkan login kembali');
        window.location="logout.php"
    </script>
    <?php
    }else {
        ?>
        <script type="text/javascript">
            alert ('Password gagal diubah, silahkan coba kembali');
            window.location="../profile.php"
        </script>
        <?php
    }
}

?>