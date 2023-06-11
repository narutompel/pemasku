<?php
require '../../koneksi.php';

$nik=$_POST['nik'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$username=$_POST['username'];
$no_telf=$_POST['no_telf'];
$password=$_POST['password'];

$sql = mysqli_query($host, "SELECT * FROM masyarakat WHERE nik='$nik'");
$cek=mysqli_num_rows($sql);

if ($cek>0) {
    ?>
    <script type="text/javascript">
        alert ('Gagal Melakukan Registrasi, NIK yang anda masukan telah digunakan');
        window.location="../regis-masyarakat.php"
    </script>
    <?php
}else {
    $regist = mysqli_query($host, "INSERT INTO masyarakat values('$nik','$nama','$email','$username','$password','$no_telf')");

    if ($regist) {
    header("location:../suksesregist.php?username=$username&&password=$password");
    } else {
        ?>
        <script type="text/javascript">
            alert ('Ada kesalahan dalam melakukan registrasi!');
            window.location="../regis-masyarakat.php"
        </script>
        <?php
    }
}

?>
