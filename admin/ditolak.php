<?php $menu="Ditolak"; include "templatedashboard/header.php";?>
<?php 
if (isset($_GET['url'])) {
  $url=$_GET['url'];
  switch ($url) {
    case 'detail-pengaduan';
      include "detailaduan.php";
      break;
    case 'lihattanggapan';
      include "detailditolak.php";
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
            </form>
      <!-- table -->
        <div class="kotakkolom mt-4">
          <table class="table">
            <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Nama Pengadu</th>
                <th>Aduan</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php 
              require "../koneksi.php";
              $batas=4;
              $sql=mysqli_query($host,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE status='Tolak'  LIMIT $batas");
              $cek=mysqli_num_rows($sql);
              if ($cek>0) {
                while ($dataaduan=mysqli_fetch_array($sql)) {
                  # code...
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $dataaduan['id_pengaduan']?></td>
                    <td class="text-center"><?php echo $dataaduan['nama']?></td>
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
                      <a href="?url=lihattanggapan&id_aduan=<?php echo $dataaduan['id_pengaduan']?>" class="btn-sm btn btn-secondary mr-2">Detail</a>
                    </td>
                  </tr>
                  <?php
                }
              }else {
                ?>
                <tr>
                  <td><h1 class ="my-1">Tidak ada aduan yang ditolak!</h1></td>
                </tr>
                <?php
              }
              ?>
          </table>
        </div>
      <!-- akhirtable -->
    </div>
  </div>
<?php
}
?>
<?php include "templatedashboard/footer.php";?>
