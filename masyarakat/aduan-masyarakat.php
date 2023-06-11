<?php $menu="Aduan"; include "templatedashboard/header.php";?>
<?php 
if (isset($_GET['url'])) {
  $url=$_GET['url'];
  switch ($url) {
    case 'detail-pengaduan';
      include "detail-pengaduan.php";
      break;
    case 'lihattanggapan';
      include "lihattanggapan.php";
      break;
    case 'detail-tanggapan';
      include "detail-tanggapan.php";
      break;

  }
}else {
  ?>
  <div class="col-10 mt-3">
    <div class="kotakkanan">
        <form class="form-inline my-2 my-lg-0" method="get" action="">
            <h1 style="font-family:'poppins';">Aduan Anda</h1>
            <input class="form-search mr-2 ml-4" value="" type="search" placeholder="Search" aria-label="Search" name="cari">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <a class="btn btn-primary ml-2 " href="tambahaduan.php">Tambah Aduan</a>
            </form>
      <!-- table -->
        <div class="kotakkolom mt-4">
          <table class="table">
            <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Tanggal Aduan</th>
                <th>Aduan</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php 
              require "../koneksi.php";
              if (isset($_GET['cari'])) {
                $cari=$_GET['cari'];
                $nomor=1;
                $sql=mysqli_query($host,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE nama LIKE'%$cari%' or tgl_pengaduan LIKE'%$cari%' or isi_laporan LIKE'%$cari%' and pengaduan.nik='$_SESSION[nik]' ORDER BY id_pengaduan DESC ");
              }else {
                $batas=4;
                $query=mysqli_query($host,"SELECT * FROM pengaduan WHERE nik='$_SESSION[nik]'");
                $jumlahdata=mysqli_num_rows($query);
                $jumlahHalaman= ceil($jumlahdata/$batas);
                $halamanAktif=(isset($_GET["halaman"]))?$_GET["halaman"]:1;
                $awaldata=($batas*$halamanAktif)-$batas;
                $nomor=1+$awaldata;
                $sql=mysqli_query($host,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE pengaduan.nik='$_SESSION[nik]' ORDER BY id_pengaduan DESC LIMIT $awaldata, $batas");
              }
              $cek=mysqli_num_rows($sql);
              if ($cek>0) {
                while ($dataaduan=mysqli_fetch_array($sql)) {
                  # code...
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $nomor++?></td>
                    <td class="text-center"><?php echo $dataaduan['tgl_pengaduan']?></td>
                    <td><?php echo $dataaduan['isi_laporan']?></td>
                    <?php if ($dataaduan['foto']=="") {
                      ?>
                      <td class="text-center">Tidak Ada Foto</td>
                      <?php
                    }else {
                      ?>
                      <td class="text-center"><img class="img" src="../asset/img/aduan/<?php echo $dataaduan['foto']?>"  alt=""></td>
                      <?php
                    }
                    ?>
                    <?php
                      if ($dataaduan['status']=="0") {
                        ?>
                        <td class="text-center">
                          <label class="btn btn-sm btn-danger">Divertifikasi</label>
                        </td>
                        <?php
                      }elseif ($dataaduan['status']=="Proses") {
                        ?>
                        <td class="text-center">
                          <label class="btn btn-sm btn-danger">Proses</label>
                        </td>
                        <?php
                      }elseif ($dataaduan['status']=="Tolak") {
                        ?>
                        <td class="text-center">
                          <label class="btn btn-sm btn-dark">Ditolak</label>
                        </td>
                        <?php
                      }else {
                        ?>
                        <td class="text-center">
                          <label class="btn btn-sm btn-success">Selesai</label>
                        </td>
                        <?php
                      }
                    ?>
                    <td class="text-center">
                    <?php
                      if ($dataaduan['status']=="Selesai") {
                        ?>
                        <a href="?url=detail-pengaduan&id=<?php echo $dataaduan['id_pengaduan']?>" class="btn-sm btn btn-secondary mr-2">Detail</a>
                        <a href="?url=detail-tanggapan&id_tanggapan=<?php echo $dataaduan['id_pengaduan']?>" class="btn btn-sm btn-primary">Lihat Tanggapan</a>
                        <?php
                      }else {
                        ?>
                        <a href="?url=detail-pengaduan&id=<?php echo $dataaduan['id_pengaduan']?>" class="btn-sm btn btn-secondary mr-2">Detail</a>
                        <a href="?url=lihattanggapan&id_aduan=<?php echo $dataaduan['id_pengaduan']?>" class="btn btn-sm btn-primary">Lihat Tanggapan</a>
                        <?php
                      }
                      ?>
                    </td>
                  </tr>
                  <?php
                }
              }else {
                ?>
                <tr>
                  <td><h1 class ="my-1">Belum ada pengaduan, Silahkan tambah pengaduan!</h1></td>
                </tr>
                <?php
              }
              ?>
          </table>
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
      <!-- akhirtable -->
    </div>
  </div>
<?php
}
?>
<?php include "templatedashboard/footer.php";?>
