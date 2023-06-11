<?php $menu="Aduan"; include "templatedashboard/header.php";?>
            <div class="col-10 mt-2">
                <div class="kotakkanan ">
            
                    <form action="proses/proses_aduan.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tgladuan">Tanggal Pengaduan</label>
                        <input type="text" class="form-control" id="tgladuan" readonly value="<?php echo date('d-m-Y')?>"><br>
                        <textarea class="form-control" rows="10" name="isi_laporan" placeholder="Ketik aduan anda disini" required ></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="textlabel" for="file">Uploud Foto Jika Ada</label><br>
                        <input class ="form-control-file my-2" accept=".jpg, .jpeg, .png" type="file" name="foto" id="file"><br>
                        <label style="color:red;">*hanya file berupa : .jpg, .jpeg, .png </label>
                    </div>
                    <button class="btn btn-primary mt-2">Kirim</button>
                    <a href="aduan-masyarakat.php" class="btn btn-primary mt-2">Kembali</a>
                    </form>
                </div>
            </div>
<?php include "templatedashboard/footer.php";?>