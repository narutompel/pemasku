<?php $menu="Admin"; include "templatedashboard/header.php";?>
<?php
if (isset($_GET['url'])) {
  $url=$_GET['url'];
  switch ($url) {
    case 'editpetugas';
      include "edit-petugas.php";
      break;
  }
}else {
  ?>
<div class="col-10 mt-3">
    <div class="kotakkanan">
        <form class="form-inline my-2 my-lg-0" method="get" action="">
            <h1>Data Admin</h1>
            <input class="form-search mr-2 ml-4" value="" type="search" placeholder="Search" aria-label="Search" name="cari">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <a href="registeradmin.php" class="btn btn-primary ml-2">Tambah Admin</a>
            </form>
        <!-- table -->
        <div class="kotakkolom mt-4">
        <table class="table">
            <thead class="text-center">
              <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Telp</th>
                  <th>Level</th>
                  <th>Action</th>
              </tr>
            </thead>
            <?php 
              require "../koneksi.php";
              if (isset($_GET['cari'])) {
                $nomor=1;
                $cari=$_GET['cari'];
                $sql=mysqli_query($host,"SELECT*FROM petugas WHERE nama_user LIKE'%$cari%' or email LIKE'%$cari%' or username LIKE'%$cari%' or telp LIKE'%$cari%' or level LIKE'%$cari%' LIMIT $batas ");
              }else {
                $batas=4;
                $query=mysqli_query($host,"SELECT * FROM petugas");
                $jumlahdata=mysqli_num_rows($query);
                $jumlahHalaman= ceil($jumlahdata/$batas);
                $halamanAktif=(isset($_GET["halaman"]))?$_GET["halaman"]:1;
                $awaldata=($batas*$halamanAktif)-$batas;
                $nomor=1+$awaldata;
                $sql=mysqli_query($host,"SELECT * FROM petugas LIMIT $awaldata,$batas");
              }
              $cek=mysqli_num_rows($sql);
              if ($cek>0) {
              while ($datapet=mysqli_fetch_array($sql)) {
              ?>
              <tr>
                <td class="text-center"><?php echo $nomor++?></td>
                <td class="text-center"><?php echo $datapet['nama_user']?></td>
                <td><?php echo $datapet['email']?></td>
                <td><?php echo $datapet['username']?></td>
                <td><?php echo $datapet['telp']?></td>
                <?php
                  if ($datapet['level']=="Admin") {
                    ?>
                    <td class="text-center"><?php echo $datapet['level']?></td>
                    <?php
                  }else {
                    ?>
                    <td class="text-center"><?php echo $datapet['level']?></td>
                    <?php
                  }
                  ?>
                <td class="text-center">
                  <a href="?url=editpetugas&id_petugas=<?php echo $datapet['id_petugas']?>" class="btn btn-sm btn-primary">Edit</a>
                  <a href="proses/adminmagic/hapuspet.php?id=<?php echo $datapet['id_petugas']?>" class="btn btn-sm btn-danger" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Mau Dihapus?')">Hapus</a>
                </td>
            </tr>
            <?php
              }
            }
            ?>
          </table>
        <!-- akhirtable -->
    </div>
      <!-- Pagination -->
          <?php
            if (!isset($_GET['cari'])) {
              ?>
              <nav class="mt-3 ml-1">
              <ul class="pagination">
                <li class="page-item disabled">
                  <?php 
                    if ($halamanAktif>1) {
                      ?>
                      <a class="page-link" href="?halaman=<?php echo $halamanAktif -1?>">Previous</a>
                      <?php
                    }
                    ?>
                </li>
                <?php for ($i=1; $i <=$jumlahHalaman; $i++):?>
                  <?php
                  if ($i == $halamanAktif) {
                    ?>
                    <li class="page-item activee" aria-current="page">
                      <a class="page-link" href="?halaman=<?php echo $i;?>"><?php echo $i;?></a>
                    </li>
                    <?php
                  }else {
                    ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i;?>"><?php echo $i;?></a></li>
                    <?php
                  }
                  ?>
                  <?php endfor;?>
                  <?php
                  if ($halamanAktif<$jumlahHalaman) {
                    ?>
                    <li class="page-item">
                      <a class="page-link" href="?halaman=<?php echo $halamanAktif +1?>">Next</a>
                    </li>
                    <?php
                  }?>
                
              </ul>
            </nav>
              <?php
            }
          ?>
      <!-- Akhir Pagination -->
</div>
<?php
}
?>

<?php include "templatedashboard/footer.php";?>