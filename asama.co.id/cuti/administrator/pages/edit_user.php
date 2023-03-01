<?php
if (isset($_SESSION['level']))
{
 
   if ($_SESSION['level'] == "pimpinan") {
	header("Location: pages/404.php");
   }
}

$sql = mysql_query("SELECT * from user where id='$_GET[id]'");
$row = mysql_fetch_array($sql);
?>	

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Data user</h1>
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
				<h3 class="page-header">Edit Username</h1>
			</div>
			
			<form class="form-horizontal" method="POST" onsubmit='return formValidation()'>
				<div class="col-lg-12">
					<div class="form-group">
						<label for="username" class="col-lg-2 control-label">Username </label>
						<div class="col-lg-6">
							<input type="text" maxlength="20" class="form-control" id="username" name="username" value="<?php echo $row['username']  ;?>">
						</div>
						<span id="us1" class="label label-success"></span><span id="us2" class="label label-warning"></span>
					</div>

					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button class="btn btn-success" type="submit" value="UpdateUsername" name="updateusername">Update</button>
						</div>
					</div>

					<div>
						<div class="col-lg-10 col-lg-offset-2">
						<?php
						if (isset($_POST["updateusername"])) {
							$cekdata = "SELECT username FROM user WHERE username='$_POST[username]'";
							$ada = mysql_query($cekdata) or die(mysql_error());
							
							if(mysql_num_rows($ada)>0){
								writeMsg('username.gagal');
							} else{
								$query = "UPDATE user SET username = '$_POST[username]' WHERE id = '$_GET[id]'"; 
								$sql = mysql_query($query); 
								
									if ($sql){
										writeMsg('update.sukses');;
									}else{
										writeMsg('update.gagal');
									}
							}						
						}
						?>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		<hr>
		
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Edit Password</h1>
			</div>
			
			<div class="col-lg-12">
				<form class="form-horizontal" method="POST" onsubmit='return formValidation()'>
					<div class="form-group">
						<label for="passwordbaru1" class="col-lg-2 control-label">Password Baru </label>
						<div class="col-lg-6">
							<input type="password" maxlength="100" class="form-control" id="passwordbaru1" name="passwordbaru1" placeholder="Password baru ..." required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="passwordbaru2" class="col-lg-2 control-label">Konfirmasi Password Baru </label>
						<div class="col-lg-6">
							<input type="password" maxlength="100" class="form-control" id="passwordbaru2" name="passwordbaru2" placeholder="Konfirmasi password baru ..." required>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button class="btn btn-success" type="submit" value="Updatepassword" name="updatepassword">Update</button>
						</div>
					</div>
					
					<div>
						<div class="col-lg-10 col-lg-offset-2">
						<?php
						if (isset($_POST["updatepassword"])) {
							$passwordbaru1 = md5($_POST['passwordbaru1']);
							$passwordbaru2= md5($_POST['passwordbaru2']);
														
							if($passwordbaru1 != $passwordbaru2){
								writeMsg('pass.tdkcocok');
							} else{
								$query = "UPDATE user SET password = '$passwordbaru1' WHERE id = '$_GET[id]'"; 
								$sql = mysql_query($query); 
								
									if ($sql){
										writeMsg('password.sukses');;
									}else{
										writeMsg('update.gagal');
									}
							}
						}
						?>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		<hr>
		
		
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Edit Info User</h1>
			</div>
			
			<div class="col-lg-12">
				<form class="form-horizontal" method="POST" onsubmit='return formValidation()'>
					<div class="form-group">
						<label for="nip" class="col-lg-2 control-label">NIP</label>
						<div class="col-lg-2">
							<input type="text" maxlength="8" class="form-control" id="nip" name="nip" value="<?php echo $row['nip']  ;?>" class="uneditable-input" readonly="true">
						</div>
						<span id="ni1" class="label label-success"></span><span id="ni2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="nama" class="col-lg-2 control-label">Nama Lengkap</label>
						<div class="col-lg-6">
							<input type="text" maxlength="50" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']  ;?>">
						</div>
						<span id="nm1" class="label label-success"></span><span id="nm2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="jenis_kelamin" class="col-lg-2 control-label">Jenis Kelamin </label>
						<div class="col-lg-6">
							<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
								<option value="<?php echo $row['jenis_kelamin']  ;?>" class="form-control" selected="selected"><?php echo $row['jenis_kelamin']  ;?></option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label for="alamat" class="col-lg-2 control-label">Alamat</label>
						<div class="col-lg-6">
							<textarea  maxlength="300" rows="2" class="form-control" id="alamat" name="alamat" required><?php echo $row['alamat']  ;?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label for="no_tlp" class="col-lg-2 control-label">No. Telepon</label>
						<div class="col-lg-6">
							<input  type="text" maxlength="12" class="form-control" id="no_tlp" name="no_tlp" value="<?php echo $row['no_tlp']  ;?>" required>
						</div>
						<span id="nt1" class="label label-success"></span><span id="nt2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="email" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-6">
							<input type="email" maxlength="100" class="form-control" id="email" name="email" value="<?php echo $row['email']  ;?>" required>
						</div>
						<span id="em1" class="label label-success"></span><span id="em2" class="label label-warning"></span>
					</div>
					
					<div class="form-group">
						<label for="blokir" class="col-lg-2 control-label">Blokir</label>
						<div class="col-lg-6">
						<select class="form-control" id="blokir" name="blokir">
							<option value="<?php echo $row['blokir']; ?>" selected="selected"><?php echo $row['blokir']; ?></option>
							<option value="Y">Ya</option>
							<option value="N">Tidak</option>
						</select>
					  </div>
					</div>
					
					<div class="form-group">
						<label for="level" class="col-lg-2 control-label">Level </label>
						<div class="col-lg-6">
							<select class="form-control" id="level" name="level">
								<option value="<?php echo $row['level']  ;?>" class="form-control" selected="selected"><?php echo $row['level']  ;?></option>
								<option value="admin">Admin</option>
								<option value="administrasi">Administrasi</option>
								<option value="keuangan">Keuangan</option>
								<option value="gudang">Gudang</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button class="btn btn-success" type="submit" value="UpdateInfo" name="updateinfo">Update</button>
						</div>
					</div>
					
					<div>
						<div class="col-lg-10 col-lg-offset-2">
						<?php
							if (isset($_POST["updateinfo"])) {
								mysql_query("UPDATE user SET nama = '".$_POST['nama']."', jenis_kelamin = '".$_POST['jenis_kelamin']."', alamat = '".$_POST['alamat']."', no_tlp = '".$_POST['no_tlp']."', email = '".$_POST['email']."', blokir = '".$_POST['blokir']."', level = '".$_POST['level']."' WHERE id = '".$_GET['id']."'");

								//Re-Load Data from DB
								$sql = mysql_query("SELECT id, nama, jenis_kelamin, alamat, no_tlp, email, blokir, level FROM user WHERE id = '".$_GET['id']."'");
								$row = mysql_fetch_array($sql);
								
								header('Location: dashboard.php?p=user&psn=4');
							}
						?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	function formValidation(){

		// Make quick references to our fields	
		var username =  document.getElementById('username');
		var nip =  document.getElementById('nip');
		var nama =  document.getElementById('nama');
		var no_tlp =  document.getElementById('no_tlp');
		var email =  document.getElementById('email');

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
				
								if(textNumericst(no_tlp, "Isi form dengan angka!")){
												
									if(lengthDefinent(no_tlp, 7, 12)){
										
										if(emailValidation(email, "Format email salah ..!")){
					
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
	</script>