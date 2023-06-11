<?php $menu="Selesai"; include "templatedashboard/header.php";?>
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
          <h1 style="font-family:'poppins';">Aduan Selesai</h1>
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
              <th>Tanggapan</th>
              <th>Nama Petugas</th>
              <th>Status</th>
              <th>Action</th>
          </tr>
          </thead>
          <?php 
            require "../koneksi.php";
            $batas=4;
            $sql=mysqli_query($host,"SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE pengaduan.status='Selesai'  LIMIT $batas");
            $cek=mysqli_num_rows($sql);

            if ($cek>0) {
              while ($dataaduan=mysqli_fetch_array($sql)) {
                # code...
                ?>
                <tr>
                  <td class="text-center"><?php echo $dataaduan['id_pengaduan']?></td>
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
                <td><h1 class ="my-1">Belum ada pengaduan yang selesai!</h1></td>
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