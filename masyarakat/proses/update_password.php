<?php 

require "../../koneksi.php";

session_start();

$nikk=$_SESSION['nik'];
$password=$_POST['password'];
$old_password=$_POST['old_password'];
$password_confirmation=$_POST['password_confirmation'];

$query = mysqli_query($host,"SELECT * FROM masyarakat WHERE nik='$nikk' AND password='$old_password'");
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
    $query = mysqli_query($host,"UPDATE masyarakat SET password='$password' WHERE nik='$nikk'");
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