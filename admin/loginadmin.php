<?php include "../templatelogin/header.php" ?>
    <section>
        <div class="container">
            <div class="aturbl">
                <h1>Login Admin</h1>
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
                    <form action="proses/cek_login.php" method="post">
                        <input type="text" name="username" placeholder="Username" class="boxtext" required><br>
                        <input type="password" name="password" placeholder="Password" class="boxtext mt-4" required><br>
                        <button type="submit" class="btn btnumum mt-4">Login</button>
                    </form>
                </div>
            </div>
        </div>
        
    </section>
<?php include "../templatelogin/footer.php" ?>