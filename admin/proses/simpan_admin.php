<?php
require '../../koneksi.php';

$nama=$_POST['nama'];
$email=$_POST['email'];
$username=$_POST['username'];
$no_telf=$_POST['no_telf'];
$password=$_POST['password'];
$level=$_POST['level'];

$regist = mysqli_query($host, "INSERT INTO petugas(nama_user, email, username, password, telp, level) values('$nama','$email','$username','$password','$no_telf','$level')");

if ($regist) {
    header("location:../suksesadmin.php?username=$username&&password=$password");
} else {
    ?>
    <script type="text/javascript">
        alert ('Gagal Melakukan Registrasi, Data yang anda masukan telah digunakan');
        window.location="../registeradmin.php"
    </script>
    <?php
}
?>
