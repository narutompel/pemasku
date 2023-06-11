<?php $menu="Aduan"; include "templatedashboard/header.php";?>
<div class="col-10 mt-3">
    <div class="kotakkanan">
        <div class="container my-5">
            <h1 class="text-center">Cetak Laporan </h1>
                <div class="row mt-4 ">
                    <div class="col-3"></div>
                    <div class="col-6 mt-3">
                        <form action="cetak/cetakaduan.php" method="get" class="form" target="_blank">
                            <div class="form-group">
                            <label for="dari">Dari Tanggal</label>
                            <input type="date" id = "dari" name="dari" class="form-control" required  value="">
                            </div>

                            <div class="form-group">
                                <label for="sampai">Sampai Tanggal</label>
                                <input type="date" name="sampai" class="form-control" required value="">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Cetak</button>
                            <a class="btn btn-primary mt-4" href="cetak/cetakaduanall.php" target="_blank">Cetak Seluruh</a>
                            <a class="btn btn-primary mt-4" href="tanggapan.php">Kembali</a>
                                
                        </form>
                    <div><br><br>
                    <div class="col-3"></div>
                </div>
        </div>
    </div>
</div>
<?php include "templatedashboard/footer.php";?>