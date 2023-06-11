<?php $menu="Dashboard"; include "templatedashboard/header.php";
require "../koneksi.php";
$query    =mysqli_query($host,"SELECT * FROM pengaduan");
$countAduan    =mysqli_num_rows($query);

$query1    =mysqli_query($host,"SELECT * FROM pengaduan WHERE status='0'");
$countAduanTerbaru   =mysqli_num_rows($query1);

$query2    =mysqli_query($host,"SELECT * FROM pengaduan WHERE status between '0' and 'proses'");
$countBelum  =mysqli_num_rows($query2);

$query3    =mysqli_query($host,"SELECT * FROM masyarakat");
$countMasyarakat  =mysqli_num_rows($query3);

$query4    =mysqli_query($host,"SELECT * FROM petugas");
$countPetugas  =mysqli_num_rows($query4);

?>
  <?php 
if (isset($_GET['url'])) {
  $url=$_GET['url'];
  switch ($url) {
    case 'detailaduan';
      include "detailaduan.php";
      break;
    case 'tanggapan';
      include "tambahtanggapan.php";
      break;
  }
}else {
  ?>
<div class="col-10 mt-3">
  <div class="kotakkanan">
    <!-- row -->
    <div class="row">
      <!-- small Box -->
      <div class="col-4">
        <div class="small-box">
          <div class="inner text-center">
            <p>Total Aduan</p>
            <h4><?php echo $countAduan;?></h4>
          </div>
          <div class="icon">
            <i class="fas fa-clipboard"></i>
          </div>
            <a href="aduan.php" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          
        </div>
      </div>
      <!-- Akhirs -->
      <?php if ($_SESSION['level']=="Admin") {
      ?>
      <!-- Small Box -->
      <div class="col-4">
        <div class="small-box">
          <div class="inner text-center">
            <p>Masyarakat</p>
            <h4><?php echo $countMasyarakat?></h4>
          </div>
          <div class="icon">
            <i class="fas fa-clipboard"></i>
          </div>
            <a href="masyarakat.php" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- akhir -->
      <!-- Small Box -->
      <div class="col-4">
        <div class="small-box">
          <div class="inner text-center">
            <p>Admin</p>
            <h4><?php echo $countPetugas?></h4>
          </div>
          <div class="icon">
            <i class="fas fa-clipboard"></i>
          </div>
            <a href="admin.php" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- akhir -->
      <?php
      }else {
        ?>
        <!-- Small Box -->
      <div class="col-4">
        <div class="small-box">
          <div class="inner text-center">
            <p>Aduan Terbaru</p>
            <h4><?php echo $countAduanTerbaru?></h4>
          </div>
          <div class="icon">
            <i class="fas fa-clipboard"></i>
          </div>
            <a href="aduan.php" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- akhir -->
      <!-- Small Box -->
      <div class="col-4">
        <div class="small-box">
          <div class="inner text-center">
            <p>Belum Ditanggapi</p>
            <h4><?php echo $countBelum?></h4>
          </div>
          <div class="icon">
            <i class="fas fa-clipboard"></i>
          </div>
            <a href="aduan.php" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          
        </div>
      </div>
      <!-- akhir -->
        <?php
      }
      ?>
    </div>
    <!-- akhir row -->
    <?php if ($_SESSION['level']=="Admin") {
      ?>
      <!-- table Admin -->
    <div class="row mt-4">
      <div class="col">
        <div class="kotakkolom">
          <div class="row">
            <div class="col">
              <h4 class="ml-3 my-3 textaduan">Masyarakat Terbaru</h4>
            </div>
            <div class="col">
              <a href="masyarakat.php" class="linksemua my-3 mr-3">Lihat Semua <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <table class="table">
            <thead class="text-center">
              <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Telp</th>
                  <th>Action</th>
              </tr>
            </thead>
            <?php 
              require "../koneksi.php";
              $batas=4;
              $no=1;
              $sql=mysqli_query($host,"SELECT * FROM masyarakat LIMIT $batas");
              $cek=mysqli_num_rows($sql);
              if ($cek>0) {
              while ($datamas=mysqli_fetch_array($sql)) {
              ?>
              <tr>
                <td class="text-center"><?php echo $no++?></td>
                <td class="text-center"><?php echo $datamas['nik']?></td>
                <td><?php echo $datamas['nama']?></td>
                <td><?php echo $datamas['email']?></td>
                <td><?php echo $datamas['username']?></td>
                <td class="text-center"><?php echo $datamas['telp']?></td>
                <td class="text-center">
                  <a href="proses/hapus.php" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
              }
            }
            ?>
          </table>
        </div>
      </div>
    </div>
    <!-- akhirtable Admin -->
      <?php
      }else {
        ?>
        <!-- table -->
    <div class="row mt-4">
      <div class="col">
        <!-- table -->
      <div class="kotakkolom mt-4">
          <div class="row">
            <div class="col">
              <h1 class="ml-3 my-3 textaduan" style="font-family:'poppins';">Aduan Terbaru</h1>
            </div>
            <div class="col">
              <a href="masyarakat.php" class="linksemua my-3 mr-3">Lihat Semua <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <table class="table">
          <thead class="text-center">
          <tr>
              <th>ID</th>
              <th>Nama Aduan</th>
              <th>Aduan</th>
              <th>Foto</th>
              <th>Status</th>
              <th>Action</th>
          </tr>
          </thead>
          <?php 
            require "../koneksi.php";
            $batas=4;
            $sql=mysqli_query($host,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE status between '0' and 'proses'  LIMIT $batas");
            $cek=mysqli_num_rows($sql);
            if ($cek>0) {
              while ($dataaduan=mysqli_fetch_array($sql)) {
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
                    <?php
                      if ($dataaduan['status']=="0") {
                        ?>
                        <a href="?url=detailaduan&id=<?php echo $dataaduan['id_pengaduan']?>" class="btn-sm btn btn-secondary mr-2">Detail & Proses</a>
                        <?php
                      }elseif ($dataaduan['status']=="Proses") {
                        ?>
                        <a href="?url=detailaduan&id=<?php echo $dataaduan['id_pengaduan']?>" class="btn-sm btn btn-secondary mr-2">Detail</a>
                        <a href="?url=tanggapan&id=<?php echo $dataaduan['id_pengaduan']?>" class="btn btn-sm btn-primary">Tanggapi</a>
                        <?php
                      }else {
                        ?>
                        <a href="?url=detailaduan&id=<?php echo $dataaduan['id_pengaduan']?>" class="btn-sm btn btn-secondary mr-2">Detail</a>
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
    <!-- akhirtable -->
      </div>
    </div>
    <!-- akhirtable -->
    <?php
      }
      ?>
  </div>
</div>
<?php
}
?>
<?php include "templatedashboard/footer.php";?>