<?php include "../templatelogin/header.php" ?>
    <section>
        <div class="container">
            <div class="aturbl">
                <h1>Login Masyarakat</h1>
                <h3 style='text-align:center; font-weight:normal;'>
                        <?php
                        if(isset($_GET['nama'])){
                            if($_GET['nama'] == "kosong"){
                                echo "Username atau password salah!";
                            }
                        }elseif (isset($_GET['login'])) {
                            if($_GET['login'] == "kosong"){
                                echo "Silahkan login terlebih dahulu!";
                            }
                        }
                        ?>
                    </h3>
                <div class="kotaklogin mt-5">
                    <form method="POST" action="proses/cek_login.php">
                        <input type="text" placeholder="Username" name="username" class="boxtext" required><br>
                        <input type="password" placeholder="Password" name="password" class="boxtext mt-4" required><br>
                        <button type="submit" class="btnumum btn mt-4">Login</button>
                        <a href="regis-masyarakat.php" class="btnumum btn mt-4">Registrasi</a>
                    </form>
                </div>
            </div>
        </div>
        
    </section>
<?php include "../templatelogin/footer.php" ?>