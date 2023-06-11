<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/style.css">

    <title>Admin - Tambah Admin</title>
  </head>
  <body class="bgbl">
    <header>
      <div class="container">
        <nav class="navbar navbar-light mt-3">
          <a class="navbar-brand" href="#"><img src="../asset/img/logo.png" alt=""></a> 
        </nav>
      </div>
    </header>
    <section>
        <div class="container">
            <div class="aturbl mt-1">
                <h1>Registrasi Akun</h1>
                <div class="kotaklogin ">
                    <form method="POST" action="proses/simpan_admin.php" onSubmit="return validasi_input(this)">
                        <input type="text" placeholder="Name" id="nama" class="boxtext mt-4" name="nama" required>
                        <label for="" id="pesan_nama"></label><br>
                        <input type="text" placeholder="Email" class="boxtext mt-2" name="email" required><br>
                        <input type="number" placeholder="No Telfon" class="boxtext mt-4" name="no_telf" required><br>
                        <input type="text" placeholder="Username" id="username" class="boxtext mt-4" name="username" required><label for="" id="pesan_username"></label><br>
                        <input type="password" placeholder="Password" id="password" class="boxtext mt-3" name="password" required>
                        <label for="" id="pesan_password"></label><br>
                        <label for="role" class="mt-2">Role</label>
                        <select name="level" id="role">
                            <option selected>Pilih Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Petugas">Petugas</option>
                        </select>
                        <br>
                        <button class="btnumum btn mt-2">Registrasi</button>
                        <a class="btnumum btn mt-2" href="admin.php">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
      function validasi_input(form){
          // validasi nama 
          pola_nama=/^[a-zA-Z ]+$/;
          if (!pola_nama.test(form.nama.value)){
          document.getElementById("pesan_nama").innerHTML = "*Nama tidak boleh berisikan angka";
          form.nama.focus();
        }
        else{
          document.getElementById("pesan_username").innerHTML = "";
        }

        //validasi username
        pola_username=/^[a-zA-Z0-9\_\-]{6,100}$/;
          if (!pola_username.test(form.username.value)){
          document.getElementById("pesan_username").innerHTML = "*Username minimal 6 karakter";
          form.username.focus();
        }
        else{
          document.getElementById("pesan_username").innerHTML = "";
        }
          // password
          pola_password=/^[a-zA-Z0-9\_\-]{6,100}$/;
          if (!pola_password.test(form.password.value)){
          document.getElementById("pesan_password").innerHTML = "*Password minimal 6 karakter";
          form.password.focus();
        }

        //validasi true false
        if (form.username.value == "" || !pola_username.test(form.username.value) || form.password.value == "" || !pola_password.test(form.password.value) || form.nama.value == "" || !pola_nama.test(form.nama.value)){
          return (false);
        } else {
          return (true);
        }
      }
    </script>
    <script src="asset/bootstrap/js/jquery.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="asset/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>