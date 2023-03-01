<?php
if (isset($_SESSION['level']))
{
 
   if ($_SESSION['level'] == "pimpinan") {
	header("Location: pages/404.php");
   }
}
?>	
	<script src="../asset/jquery/jquery.min.js"></script>
	<script>
	// Script untuk cek ketersediaan username
	$(document).ready(function() {
		$('#username').change(function() {  // Jika terjadi perubahan pada id username
			var username = $(this).val(); // Ciptakan variabel username untuk menampung alamat username yang diinputkan
			$.ajax({ // Lakukan pengiriman data dengan Ajax
				type: 'POST', // dengan tipe pengiriman POST
				url: 'pages/aksi/cek_username.php', // dan kirimkan prosesnya ke file cek-username.php
				data: 'username=' + username,  // datanya ialah data username
				 
				success: function(response) { // Jika berhasil
					$('.hasil-username').html(response); // Tampilkan pesan ke class hasil-username
				}
			});
		});
	});
	</script>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah User</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-4">
				<a href="dashboard.php?p=user"><button class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"> Kembali</span></button></a>
			</div>
			<div class="col-lg-4">
				<span id="head" class="label label-success"></span>
			</div>
		</div>
		
		<br />

		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" method="POST" onsubmit='return formValidation()'>
				<?php
					if (isset($_POST["simpan"])) {
						$cekdata = "SELECT username from user WHERE username='$_POST[username]'";
						$ada = mysql_query($cekdata) or die(mysql_error());
						
						$password = md5("123456");
						
						if(mysql_num_rows($ada)>0){
							header('Location: dashboard.php?p=user&psn=1');
						} else{
							$query="INSERT INTO user (username, password, nip, nama, alamat, jenis_kelamin, no_tlp, email, blokir, level) VALUES ('$_POST[username]', '$password', '$_POST[nip]', '$_POST[nama]', '$_POST[alamat]', '$_POST[jenis_kelamin]', '$_POST[no_tlp]', '$_POST[email]', '$_POST[blokir]', '$_POST[level]')";
							$sql = mysql_query($query); 
							
								if ($sql){
									header('Location: dashboard.php?p=user&psn=2');
								}else{
									header('Location: dashboard.php?p=user&psn=3');
								}
						}						
					}
				?>
					<div class="form-group">
						<label for="username" class="col-lg-2 control-label">Username </label>
						<div class="col-lg-2">
							<input type="text" maxlength="20" class="form-control" id="username" name="username" placeholder="username user ...">
						</div>
						<div class="col-lg-6">
							<span class="hasil-username"></span>
						</div>
						<span id="us1" class="label label-success"></span><span id="us2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="nip" class="col-lg-2 control-label">NIP</label>
						<div class="col-lg-2">
							<input type="text" maxlength="8" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP ...">
						</div>
						<span id="ni1" class="label label-success"></span><span id="ni2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="nama" class="col-lg-2 control-label">Nama user </label>
						<div class="col-lg-6">
							<input type="text" maxlength="50" class="form-control" id="nama" name="nama" placeholder="Nama user ...">
						</div>
						<span id="nm1" class="label label-success"></span><span id="nm2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="alamat" class="col-lg-2 control-label">Alamat </label>
						<div class="col-lg-6">
							<textarea  maxlength="255" class="form-control" id="alamat" name="alamat" required></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label for="jenis_kelamin" class="col-lg-2 control-label">Jenis Kelamin </label>
						<div class="col-lg-6">
							<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
								<option value="">( Pilih Jenis Kelamin )</option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<span id="jk1" class="label label-success"></span><span id="jk2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="no_tlp" class="col-lg-2 control-label">No. Telepon </label>
						<div class="col-lg-6">
							<input type="text" maxlength="12" class="form-control" id="no_tlp" name="no_tlp" placeholder="Nomor telepon ..."> <br />
						</div>
						<span id="nt1" class="label label-success"></span><span id="nt2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="email" class="col-lg-2 control-label">Email </label>
						<div class="col-lg-6">
							<input type="email"  maxlength="100" class="form-control" id="email" name="email" placeholder="Email ..." >
						</div>
						<span id="em1" class="label label-success"></span><span id="em2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="blokir" class="col-lg-2 control-label">Blokir </label>
						<div class="col-lg-6">
							<select class="form-control" id="blokir" name="blokir">
								<option value="">( Pilih Status Blokir )</option>
								<option value="N">Tidak</option>
								<option value="Y">Ya</option>
							</select>
						</div>
						<span id="bl1" class="label label-success"></span><span id="bl2" class="label label-warning"></span>
					</div>

					<div class="form-group">
						<label for="level" class="col-lg-2 control-label">Level </label>
						<div class="col-lg-6">
							<select class="form-control" id="level" name="level">
								<option value="">( Pilih Level )</option>
								<option value="admin">Admin</option>
								<option value="administrasi">Administrasi</option>
								<option value="keuangan">Keuangan</option>
								<option value="gudang">Gudang</option>
							</select>
						</div>
						<span id="lv1" class="label label-success"></span><span id="lv2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button class="btn btn-danger" type="reset" value="Reset" >Reset</button>
							<button class="btn btn-success" type="submit" value="Simpan" name="simpan">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	// Script untuk validasi FORM
	function formValidation(){

		// Make quick references to our fields	
		var username =  document.getElementById('username');
		var nip =  document.getElementById('nip');
		var nama =  document.getElementById('nama');
		var jenis_kelamin =  document.getElementById('jenis_kelamin');
		var no_tlp =  document.getElementById('no_tlp');
		var email =  document.getElementById('email');
		var blokir =  document.getElementById('blokir');
		var level =  document.getElementById('level');

		//  to check empty form fields.

		if(username.value.length == 0){
			document.getElementById('head').innerText = "Semua form harus diisi!"; //this segment displays the validation rule for all fields
			username.focus();
			return false;
		} 
		
		if(textAlphanumericusr(username, "Isi form dengan huruf atau angka")){
			
			if(lengthDefineusr(username, 5, 20)){
				
				if(textAlphanumericni(nip, "Isi form dengan huruf atau angka!")){
							
					if(lengthDefineni(nip, 8, 8)){
				
						if(textAlphanumericspace(nama, "Isi form tanpa karakter spesial!")){
									
							if(lengthDefinenm(nama, 5, 50)){
				
								if(trueSelectionjk(jenis_kelamin, "Pilih salah satu!")){
				
									if(textNumericst(no_tlp, "Isi form dengan angka!")){
												
										if(lengthDefinent(no_tlp, 7, 12)){
										
											if(emailValidation(email, "Format email salah ..!")){
												
												if(trueSelectionbl(blokir, "Pilih salah satu!")){
													
													if(trueSelectionlv(level, "Pilih salah satu!")){
					
													return true;
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
		
		return false;
		
	}
	
	// Username
	function textAlphanumericusr(inputtext, alertMsg){
		var alphaExp = /^[0-9a-zA-Z]+$/;
		if(inputtext.value.match(alphaExp)){
			return true;
		}else{
			document.getElementById('us1').innerText = alertMsg; //this segment displays the validation rule for address
			inputtext.focus();
			return false;
		}
	}
	function lengthDefineusr(inputtext, min, max){
		var uInput = inputtext.value;
		if(uInput.length >= min && uInput.length <= max){
			return true;
		}else{
			
			document.getElementById('us2').innerText = "* Masukkan " +min+ " sampai " +max+ " karakter *"; 
			inputtext.focus();
			return false;
		}
	}

	//NIP
	function textAlphanumericni(inputtext, alertMsg){
		var alphaExp = /^[0-9a-zA-Z]+$/;
		if(inputtext.value.match(alphaExp)){
			return true;
		}else{
			document.getElementById('ni1').innerText = alertMsg; //this segment displays the validation rule for address
			inputtext.focus();
			return false;
		}
	}
	function lengthDefineni(inputtext, min, max){
		var uInput = inputtext.value;
		if(uInput.length >= min && uInput.length <= max){
			return true;
		}else{
			
			document.getElementById('ni2').innerText = "* Masukkan " +min+ " sampai " +max+ " karakter *"; 
			inputtext.focus();
			return false;
		}
	}
	
	//Nama
	//function that checks whether input text includes alphabetic and numeric characters.
	function textAlphanumericspace(inputtext, alertMsg){
		var alphaExp = /^[0-9a-zA-Z .()]+$/;
		if(inputtext.value.match(alphaExp)){
			return true;
		}else{
			document.getElementById('nm1').innerText = alertMsg; //this segment displays the validation rule for address
			inputtext.focus();
			return false;
		}
	}
	function lengthDefinenm(inputtext, min, max){
		var uInput = inputtext.value;
		if(uInput.length >= min && uInput.length <= max){
			return true;
		}else{
			
			document.getElementById('nm2').innerText = "* Masukkan " +min+ " sampai " +max+ " karakter *"; 
			inputtext.focus();
			return false;
		}
	}

	// Jenis Kelamin
	function trueSelectionjk(inputtext, alertMsg){
		if(inputtext.value == ""){
			document.getElementById('jk1').innerText = alertMsg; //this segment displays the validation rule for selection
			inputtext.focus();
			return false;
		}else{
			return true;
		}
	}
	
	//No. Tlp
	function textNumericst(inputtext, alertMsg){
		var numericExpression = /^[0-9]+$/;
		if(inputtext.value.match(numericExpression)){
			return true;
		}else{
			document.getElementById('nt1').innerText = alertMsg;  //this segment displays the validation rule for zip
			inputtext.focus();
			return false;
		}
	}
	// Function that checks whether the input characters are restricted according to defined by user.
	function lengthDefinent(inputtext, min, max){
		var uInput = inputtext.value;
		if(uInput.length >= min && uInput.length <= max){
			return true;
		}else{
			
			document.getElementById('nt2').innerText = "* Masukkan " +min+ " sampai " +max+ " karakter *"; 
			inputtext.focus();
			return false;
		}
	}
	
	//Email
	function emailValidation(inputtext, alertMsg){
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		if(inputtext.value.match(emailExp)){
			return true;
		}else{
			document.getElementById('em1').innerText = alertMsg; //this segment displays the validation rule for email
			inputtext.focus();
			return false;
		}
	}
	
	// Blokir
	function trueSelectionbl(inputtext, alertMsg){
		if(inputtext.value == ""){
			document.getElementById('bl1').innerText = alertMsg; //this segment displays the validation rule for selection
			inputtext.focus();
			return false;
		}else{
			return true;
		}
	}
	
	// Level
	function trueSelectionlv(inputtext, alertMsg){
		if(inputtext.value == ""){
			document.getElementById('lv1').innerText = alertMsg; //this segment displays the validation rule for selection
			inputtext.focus();
			return false;
		}else{
			return true;
		}
	}
	</script>