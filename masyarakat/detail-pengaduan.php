
<div class="col-10 mt-2">
    <div class="kotakkanan ">
        <h2>Detail Laporan</h2>
        <div class="row ">
            <div class="col-7 mt-4">
                <?php 
                require "../koneksi.php";
                $proses=mysqli_query($host,"SELECT*FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE id_pengaduan='$_GET[id]'");
                $data=mysqli_fetch_array($proses);
                if ($proses) {
                    ?>
            
                <div class="row">
                    <div class="col-4">
                        <label for="" class="">Nama </label>
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
        <a href="aduan-masyarakat.php" class="btn btn-primary mt-4">Kembali</a>
        </div>
        <?php
            }
        ?>
    </div>
</div>
