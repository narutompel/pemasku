<?php include "../templatelogin/header.php" ?>
    <section>
        <div class="container">
            <div class="aturbl">
                <h1>Registrasi Berhasil</h1>
                <div class="kotaklogin1 mt-5 atursukses">
                    <form action="">
                        <div class="con">
                            <h2>Username <span>:</span> <?php echo $_GET['username'] ?></h2>
                            <h2>Password <span class="ml-4">:</span> <?php echo $_GET['password'] ?></h2>
                            <p class="mt-3">Mohon Untuk Menyimpan Data Kamu Dengan Baik!</p>
                        </div>
                        <a href="login-masyarakat.php" class="btn btnumum mt-2">Kembali Ke Login</a>
                    </form>
                </div>
            </div>
        </div>
        
    </section>
<?php include "../templatelogin/footer.php" ?>