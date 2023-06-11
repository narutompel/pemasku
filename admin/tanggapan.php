<?php $menu="Tanggapan"; include "templatedashboard/header.php";?>
  <?php 
if (isset($_GET['url'])) {
  $url=$_GET['url'];
  switch ($url) {
    case 'detailtanggapan';
      include "detailtanggapan.php";
      break;
  }
}else {
  ?>
  <div class="col-10 mt-3">
    <div class="kotakkanan">
        <form class="form-inline my-2 my-lg-0" method="get" action="">
            <h1 style="font-family:'poppins';">Tanggapan</h1>
            <input class="form-search mr-2 ml-4" value="" type="search" placeholder="Search" aria-label="Search" name="cari">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <?php
              if ($_SESSION['level']=="Petugas") {
              ?>
              <a href="tanggapancetak.php" class="btn btn-primary ml-2">Cetak Tanggapan</a>
              <?php
            }
            ?>
            </form>
      <!-- table -->
        <div class="kotakkolom mt-4">
          <table class="table">
            <thead class="text-center">
            <tr>
                <th>No</th>
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
              if (isset($_GET['cari'])) {
                $nomor=1;
                $cari=$_GET['cari'];
                $sql=mysqli_query($host,"SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE nama LIKE'%$cari%' or nama_user LIKE'%$cari%' or isi_laporan LIKE'%$cari%' or tanggapan LIKE'%$cari%'");
              }else{
                $batas=4;
                $query=mysqli_query($host,"SELECT * FROM tanggapan");
                $jumlahdata=mysqli_num_rows($query);
                $jumlahHalaman= ceil($jumlahdata/$batas);
                $halamanAktif=(isset($_GET["halaman"]))?$_GET["halaman"]:1;
                $awaldata=($batas*$halamanAktif)-$batas;
                $nomor=1+$awaldata;
                $sql=mysqli_query($host,"SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas  LIMIT $awaldata,$batas");
              }
              $cek=mysqli_num_rows($sql);

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
                  <td><h1 class ="my-1">Belum ada pengaduan yang anda tanggapi</h1></td>
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