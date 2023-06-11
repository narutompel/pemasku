<div class="col-10 mt-3">
    <div class="kotakkanan ">
      <div class="row mt-3">
        <div class="col-6">
          <h1 class="text-center">Profile</h1>
          <div class="container-profile">
            <form action="" method="post" onSubmit="return validasi_input(this)">
            <?php 
              require "../koneksi.php";
              $proses=mysqli_query($host,"SELECT*FROM petugas WHERE id_petugas='$_GET[id_petugas]'");
              $data=mysqli_fetch_array($proses);
              ?>
              <label for="nik" class="mt-4">Username :</label>
              <input type="text" name="username" class="boxtext" id="username" style="background-color:transparent;" value="<?php echo $data['username']?>" disabled required>
              <label for="" id="pesan_username"></label><br>
              <label for="name" class="">Nama :</label>
              <input type="text" name="nama" class="boxtext" id="nama" style="background-color:transparent;" value="<?php echo $data['nama_user']?>" disabled required>
              <label for="" id="pesan_nama"></label><br>
              <label for="email" class="">Email :</label>
              <input type="text" name="email" class="boxtext" id="email" style="background-color:transparent;" value="<?php echo $data['email']?>" disabled required><br><br>
              <label for="no_telf" class="">No Telf :</label>
              <input type="number" name="no_telf" class="boxtext" id="no_telf" style="background-color:transparent;" value="<?php echo $data['telp']?>" disabled required>
              <a href="admin.php" class="btn btn-primary mt-3">Kembali</a>
            </form>
          </div>
        </div>
        <div class="col-6">
          <h2 class="text-center">Ubah Password</h2>
          <div class="container-profile">
            <form action="proses/adminmagic/edit_password.php" method="post" enctype="multipart/form-data" >
            <form action="proses/adminmagic/edit_password.php" method="post" enctype="multipart/form-data" >
              <label for="nik" class="mt-2" >Id :</label>
              <input type="text" name="id_petugas" class="boxtext form-control" id="username" style="background-color:transparent;" value="<?php echo $data['id_petugas']?>" readonly required>
              <label for="current-password" class="mt-4">Password Sebelumnya :</label>
              <input type="text" class="boxtext form-control" name="old_password" id="current-password" style="background-color:transparent !important;" required>
              
              <label for="new-password" class="mt-2">Password Baru :</label>
              <input type="text" class="boxtext form-control" name="password" id="password" style="background-color:transparent;" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{6,20}$">
              <label for="">*Password min 6 karakter</label><br>
              <label for="password_confirmation" class="mt-2">Ulangi Password :</label>
              <input type="text" class="boxtext form-control" id="password_confirmation" name="password_confirmation" style="background-color:transparent;" required>

              <button class="btn btn-primary mt-3">Simpan</button><br>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
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

	//validasi true false
	if (form.username.value == "" || !pola_username.test(form.username.value) || form.nama.value == "" || !pola_nama.test(form.nama.value)){
		return (false);
	} else {
		return (true);
	}
}
</script>