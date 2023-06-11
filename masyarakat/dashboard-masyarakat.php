<?php $menu="Dashboard"; include "templatedashboard/header.php";

require "../koneksi.php";
$aduan    =mysqli_query($host,"SELECT * FROM pengaduan WHERE nik='$_SESSION[nik]'");
$countAduan    =mysqli_num_rows($aduan);

$tanggapan    =mysqli_query($host,"SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan WHERE nik='$_SESSION[nik]'");
$countTanggapan   =mysqli_num_rows($tanggapan);

$selesai    =mysqli_query($host,"SELECT * FROM pengaduan WHERE nik='$_SESSION[nik]' && status='selesai'");
$countSelesai    =mysqli_num_rows($selesai);
?>
<?php
if (isset($_GET['url'])) {
  $url=$_GET['url'];
  switch ($url) {
    case 'detailtanggapan';
      include "detail-tanggapan.php";
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
              <p>Aduan</p>
              <h4><?php echo $countAduan ?></h4>
            </div>
            <div class="icon">
              <i class="fas fa-clipboard"></i>
            </div>
              <a href="aduan-masyarakat.php" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            
          </div>
        </div>
        <!-- Akhirs -->
        <!-- Small Box -->
        <div class="col-4">
          <div class="small-box">
            <div class="inner text-center">
              <p>Tanggapan</p>
              <h4><?php echo $countTanggapan?></h4>
            </div>
            <div class="icon">
              <i class="fas fa-clipboard"></i>
            </div>
              <a href="tanggapan-masyarakat.php" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            
          </div>
        </div>
        <!-- akhir -->
        <!-- Small Box -->
        <div class="col-4">
          <div class="small-box">
            <div class="inner text-center">
              <p>Selesai</p>
              <h4><?php echo $countSelesai?></h4>
            </div>
            <div class="icon">
              <i class="fas fa-clipboard"></i>
            </div>
              <a href="selesai-masyarakat.php" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
            
          </div>
        </div>
        <!-- akhir -->
      </div>
      <!-- akhir row -->
      <!-- table -->
      <div class="row mt-4">
        <div class="col">
        <div class="kotakkolom mt-4">
          <div class="row">
            <div class="col">
              <h1 class="ml-3 my-3 textaduan" style="font-family:'poppins';">Tanggapan Terbaru</h1>
            </div>
            <div class="col">
              <a href="masyarakat.php" class="linksemua my-3 mr-3">Lihat Semua <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <table class="table">
            <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Nama Pengadu</th>
                <th>Aduan</th>
                <th>Tanggapan</th>
                <th>Nama Petugas</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php 
              require "../koneksi.php";
              $batas=4;
              $sql=mysqli_query($host,"SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE pengaduan.nik='$_SESSION[nik]'  LIMIT $batas");
              $cek=mysqli_num_rows($sql);
              $nomor=1;

              if ($cek>0) {
                while ($dataaduan=mysqli_fetch_array($sql)) {
                  # code...
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $nomor++?></td>
                    <td class="text-center"><?php echo $dataaduan['nama']?></td>
                    <td><?php echo $dataaduan['isi_laporan']?></td>
                    <td><?php echo $dataaduan['tanggapan']?></td>
                    <td class="text-center"><?php echo $dataaduan['nama_user']?></td>
                    <td class="text-center">
                      <label class="btn btn-sm btn-success">Selesai</label>
                    </td>
                    <td class="text-center">
                    
                      <a href="?url=detailtanggapan&id_tanggapan=<?php echo $dataaduan['id_tanggapan']?>" class="btn-sm btn btn-primary mr-2">Detail</a>
                    </td>
                  </tr> 
                  <?php
                }
              }else {
                ?>
                <tr>
                  <td><h1 class ="my-1">Belum ada Tanggapan terbaru!</h1></td>
                </tr>
                <?php
              }
              ?>
          </table>
        </div>

        </div>
      </div>
      <!-- akhirtable -->
    </div>
  </div>
<?php
}
?>
<?php include "templatedashboard/footer.php";?>