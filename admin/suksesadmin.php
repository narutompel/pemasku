<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../asset/style.css">

    <title>Pemas2021</title>
  </head>
  <body class="bgbl">
    <header>
      <div class="container logo">
        <nav>
          <a href="../index.php"><img src="../asset/img/logo.png" alt=""></a> 
        </nav>
      </div>
    </header>
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
                        <a href="admin.php" class="btn btnumum mt-2">Kembali Ke Login</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="asset/bootstrap/js/jquery.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="asset/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>