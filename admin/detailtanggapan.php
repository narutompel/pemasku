<div class="col-10 mt-2">
    <div class="kotakkanan ">
        <h2>Detail Laporan</h2>
        <div class="row ">
            <div class="col-7 mt-4">
                <?php 
                require "../koneksi.php";
                $proses=mysqli_query($host,"SELECT*FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE pengaduan.id_pengaduan='$_GET[id_tanggapan]'");
                $data=mysqli_fetch_array($proses);
                if ($proses) {
                    ?>
            
                <div class="row">
                    <div class="col-4">
                        <label for="" class="">Nama Pengadu </label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" value="<?php echo $data['nama']?>" readonly>
                    </div>

                    <div class="col-4 mt-2">
                        <label for="" class="">Tanggal Pengaduan </label>
                    </div>
                    <div class="col-8 mt-2">
                        <input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($data['tgl_pengaduan']))?>" readonly>
                    </div>

                    <div class="col-4 mt-2">
                        <label for="" class="">Isi Laporan </label>
                    </div>
                    <div class="col-8 mt-2">
                        <textarea type="text" class="form-control" rows="6" readonly><?php echo $data['isi_laporan']?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-5 text-center mt-5">
                <div class="imgtanggapi">
                    <?php if ($data['foto']=="") {
                        ?>
                        <h2>Tidak Ada Foto</h2>
                        <?php
                    }else {
                        ?>
                        <div class="imgtanggapi">
                        <img src="../asset/img/aduan/<?php echo $data['foto']?>" alt="">
                        </div>
                        <?php
                    }
                    ?>
                    
                    
                </div>
            </div>
        </div>
        <form action="" method="POST">
        <label for="" class=""><h2 style="font-family:'poppins'">Tanggapan</h2></label>
        <div class="row">
            <div class="col-7 mt-4">
                <div class="row">
                    <div class="col-4">
                        <label for="" class="">Nama Petugas </label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" value="<?php echo $data['nama_user']?>" readonly>
                    </div>

                    <div class="col-4 mt-2">
                        <label for="" class="">Tanggal Tanggapan </label>
                    </div>
                    <div class="col-8 mt-2">
                        <input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($data['tgl_tanggapan']))?>" readonly>
                    </div>

                    <div class="col-4 mt-2">
                        <label for="" class="">Isi Tanggapan</label>
                    </div>
                    <div class="col-8 mt-2">
                        <textarea type="text" class="form-control" rows="6" readonly><?php echo $data['tanggapan']?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-5"></div>
        </div>
            
        <a href="tanggapan.php" class="btn btn-primary mt-4">Kembali</a>
        </form>
        </div>
        <?php
            }
        ?>
        
    </div>
</div>
