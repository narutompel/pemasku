<?php include "../templatelogin/header.php" ?>
  <section>
    <div class="container">
        <div class="aturbl mt-1">
            <h1>Registrasi Akun</h1>
            <div class="kotaklogin ">
                <form method="POST" action="proses/simpan_masyarakat.php" onSubmit="return validasi_input(this)"> 
                    <input type="number" id="nik" placeholder="NIK" class="boxtext mt-4" name="nik"required >
                    <label for="" id="pesan_nik"></label><br>
                    <input type="text" id="nama" placeholder="Name" class="boxtext mt-2" name="nama"  required>
                    <label for="" id="pesan_nama"></label><br>
                    <input type="text" placeholder="Email" class="boxtext mt-2" name="email" required><br>
                    <input type="number" placeholder="No Telfon" class="boxtext mt-4" name="no_telf" required><br>
                    <input type="text" id="username" placeholder="Username" class="boxtext mt-4" name="username" required><br>
                    <label for="" id="pesan_username"></label>
                    <input type="password" id="password" placeholder="Password" class="boxtext mt-2" name="password" required><br>
                    <label for="" id="pesan_password"></label><br>
                    <button type="submit" class="btnumum btn  mt-4">Registrasi</button>
                    <a href="login-masyarakat.php" class="btnumum btn mt-4">Punya Akun?</a>
                </form>
            </div>
        </div>
    </div>
  </section>
  <script type="text/javascript">
function validasi_input(form){
	//validasi nik
    if (form.nik.value.length != 16){
		document.getElementById("pesan_nik").innerHTML = "*NIK harus 16 karakter";
		form.nik.focus();
		return (false);
	}else{
		document.getElementById("pesan_nik").innerHTML = "";
	}
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
	if (form.nik.value == "" || form.nik.value.length != 16 || form.username.value == "" || !pola_username.test(form.username.value) || form.password.value == "" || !pola_password.test(form.password.value) || form.nama.value == "" || !pola_nama.test(form.nama.value)){
		return (false);
	} else {
		return (true);
	}
}
</script>
  <?php include "../templatelogin/footer.php" ?>